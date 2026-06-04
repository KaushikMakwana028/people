<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_lead_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Helper to apply flexible date/time filters
     */
    private function _apply_date_filters($filters)
    {
        // Allow callers to specify which date column to filter on (e.g. updated_at for history)
        $date_col = !empty($filters['date_column']) ? $filters['date_column'] : 'pl.created_at';

        if (!empty($filters['date'])) {
            $this->db->where("DATE({$date_col})", $filters['date']);
        } else {
            if (!empty($filters['month'])) {
                $this->db->where("MONTH({$date_col})", (int)$filters['month']);
            }
            if (!empty($filters['year'])) {
                $this->db->where("YEAR({$date_col})", (int)$filters['year']);
            }
        }
    }

    /**
     * Get leads with filtering, search, and pagination
     */
    public function get_leads($product_id = null, $filters = [], $search = '', $limit = null, $offset = null, $order_by = 'pl.id', $order_dir = 'DESC')
    {
        $this->db->select('pl.*, p.name as product_name');
        $this->db->from('product_leads pl');
        $this->db->join('products p', 'p.id = pl.product_id', 'left');

        if ($product_id !== null && $product_id !== '') {
            $this->db->where('pl.product_id', (int)$product_id);
        }

        if (!empty($filters['status'])) {
            $this->db->where('pl.status', $filters['status']);
        }

        // History mode: exclude 'New' leads (no status change yet)
        if (!empty($filters['exclude_new'])) {
            $this->db->where('pl.status !=', 'New');
        }

        if (isset($filters['sales_id'])) {
            if ($filters['sales_id'] === 'NULL') {
                $this->db->where('pl.sales_id IS NULL', null, false);
            } else {
                $this->db->where('pl.sales_id', (int)$filters['sales_id']);
            }
        }

        $this->_apply_date_filters($filters);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('pl.name', $search);
            $this->db->or_like('pl.mobile', $search);
            $this->db->or_like('pl.city', $search);
            $this->db->group_end();
        }

        if ($limit !== null) {
            $this->db->limit((int)$limit, (int)$offset);
        }

        $allowed_sorts = ['pl.id', 'pl.name', 'pl.mobile', 'pl.city', 'pl.status', 'pl.created_at', 'status_sequence'];
        if (!in_array($order_by, $allowed_sorts)) {
            $order_by = 'pl.id';
        }
        if ($order_by === 'status_sequence') {
            $this->db->order_by("CASE 
                WHEN pl.status = 'Contacted' THEN 1 
                WHEN pl.status = 'Follow Up' THEN 2 
                WHEN pl.status = 'Converted' THEN 3 
                WHEN pl.status = 'Not Interested' THEN 4 
                ELSE 5 
            END", "ASC", false);
            $this->db->order_by('pl.id', 'DESC');
        } else {
            $order_dir = strtoupper($order_dir) === 'ASC' ? 'ASC' : 'DESC';
            $this->db->order_by($order_by, $order_dir);
        }

        return $this->db->get()->result();
    }

    /**
     * Count leads matching filters
     */
    public function count_leads($product_id = null, $filters = [], $search = '')
    {
        $this->db->from('product_leads pl');

        if ($product_id !== null && $product_id !== '') {
            $this->db->where('pl.product_id', (int)$product_id);
        }

        if (!empty($filters['status'])) {
            $this->db->where('pl.status', $filters['status']);
        }

        // History mode: exclude 'New' leads (no status change yet)
        if (!empty($filters['exclude_new'])) {
            $this->db->where('pl.status !=', 'New');
        }

        if (isset($filters['sales_id'])) {
            if ($filters['sales_id'] === 'NULL') {
                $this->db->where('pl.sales_id IS NULL', null, false);
            } else {
                $this->db->where('pl.sales_id', (int)$filters['sales_id']);
            }
        }

        $this->_apply_date_filters($filters);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('pl.name', $search);
            $this->db->or_like('pl.mobile', $search);
            $this->db->or_like('pl.city', $search);
            $this->db->group_end();
        }

        return $this->db->count_all_results();
    }

    /**
     * Get KPI counts (Contacted, Follow Up, Converted, Not Interested) for a product
     */
    public function get_kpi_counts($product_id = null, $filters = [], $search = '')
    {
        $counts = [
            'Contacted' => 0,
            'Follow Up' => 0,
            'Converted' => 0,
            'Not Interested' => 0,
            'New' => 0
        ];

        $this->db->select('pl.status, COUNT(*) as cnt');
        $this->db->from('product_leads pl');
        if ($product_id !== null && $product_id !== '') {
            $this->db->where('pl.product_id', (int)$product_id);
        }
        
        if (isset($filters['sales_id'])) {
            if ($filters['sales_id'] === 'NULL') {
                $this->db->where('pl.sales_id IS NULL', null, false);
            } else {
                $this->db->where('pl.sales_id', (int)$filters['sales_id']);
            }
        }

        // History mode: exclude 'New' leads (no status change yet)
        if (!empty($filters['exclude_new'])) {
            $this->db->where('pl.status !=', 'New');
        }

        $this->_apply_date_filters($filters);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('pl.name', $search);
            $this->db->or_like('pl.mobile', $search);
            $this->db->or_like('pl.city', $search);
            $this->db->group_end();
        }

        $this->db->group_by('pl.status');
        $results = $this->db->get()->result();

        foreach ($results as $row) {
            if (isset($counts[$row->status])) {
                $counts[$row->status] = (int)$row->cnt;
            }
        }

        return $counts;
    }

    /**
     * Get single lead by ID
     */
    public function get_lead($id)
    {
        $this->db->select('pl.*, p.name as product_name');
        $this->db->from('product_leads pl');
        $this->db->join('products p', 'p.id = pl.product_id', 'left');
        $this->db->where('pl.id', (int)$id);
        return $this->db->get()->row();
    }

    /**
     * Batch insert leads
     */
    public function insert_batch($data)
    {
        if (empty($data)) return false;
        return $this->db->insert_batch('product_leads', $data);
    }

    /**
     * Insert single lead
     */
    public function insert_lead($data)
    {
        $this->db->insert('product_leads', $data);
        return $this->db->insert_id();
    }

    /**
     * Update lead status and notes
     */
    public function update_status($id, $status, $notes, $sales_id = null)
    {
        $data = [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if ($notes !== null) {
            $data['notes'] = $notes;
        }
        if ($sales_id !== null) {
            $data['sales_id'] = $sales_id;
        }

        $this->db->where('id', (int)$id);
        return $this->db->update('product_leads', $data);
    }

    /**
     * Delete lead
     */
    public function delete_lead($id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->delete('product_leads');
    }
}
