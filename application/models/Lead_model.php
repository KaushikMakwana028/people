<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Lead_model
 * Handles all DB operations for the leads table.
 */
class Lead_model extends CI_Model
{
    private $table = 'leads';

    public function __construct()
    {
        parent::__construct();
    }

    // ──────────────────────────────────────────────
    //  COUNT helpers (for stat cards on top of page)
    // ──────────────────────────────────────────────

    /** Total leads */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /** Count by status */
    public function count_by_status($status)
    {
        return $this->db
                    ->where('status', $status)
                    ->count_all_results($this->table);
    }

    // ──────────────────────────────────────────────
    //  READ
    // ──────────────────────────────────────────────

    /**
     * Get leads with optional filters & search.
     *
     * @param  array  $filters  ['status'=>'new', 'source'=>'Website']
     * @param  string $search   free-text searched across name/email/company
     * @return array
     */
    public function get_leads($filters = [], $search = '')
    {
        // Join users table to get assignee name
        $this->db->select('l.*, u.name AS assignee_name')
                 ->from($this->table . ' l')
                 ->join('users u', 'u.id = l.assignee_id', 'left');

        if (!empty($filters['status'])) {
            $this->db->where('l.status', $filters['status']);
        }
        if (!empty($filters['source'])) {
            $this->db->where('l.source', $filters['source']);
        }
        if (!empty($search)) {
            $this->db->group_start()
                     ->like('l.name',    $search)
                     ->or_like('l.email',   $search)
                     ->or_like('l.company', $search)
                     ->group_end();
        }

        $this->db->order_by('l.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    /** Single lead by id */
    public function get_lead($id)
    {
        $this->db->select('l.*, u.name AS assignee_name')
                 ->from($this->table . ' l')
                 ->join('users u', 'u.id = l.assignee_id', 'left')
                 ->where('l.id', (int)$id);
        return $this->db->get()->row_array();
    }

    // ──────────────────────────────────────────────
    //  CREATE / UPDATE / DELETE
    // ──────────────────────────────────────────────

    /** Insert new lead – returns new ID */
    public function create_lead($data)
    {
        $this->db->insert($this->table, $this->_clean($data));
        return $this->db->insert_id();
    }

    /** Update existing lead */
    public function update_lead($id, $data)
    {
        $this->db->where('id', (int)$id)
                 ->update($this->table, $this->_clean($data));
        return $this->db->affected_rows();
    }

    /** Delete a lead */
    public function delete_lead($id)
    {
        $this->db->where('id', (int)$id)->delete($this->table);
        return $this->db->affected_rows();
    }

    // ──────────────────────────────────────────────
    //  Internal helpers
    // ──────────────────────────────────────────────

    /** Strip any keys that don't belong in the table */
    private function _clean($data)
    {
        $allowed = ['name','email','phone','company','source',
                    'status','value','assignee_id','notes'];
        return array_intersect_key($data, array_flip($allowed));
    }
}
