<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_model extends CI_Model
{
    private $table = 'expenses';

    public function get_expenses($filters = [], $search = '')
    {
        $this->db->select('e.*, u.name AS created_by_name')
            ->from($this->table . ' e')
            ->join('users u', 'u.id = e.created_by', 'left');

        if (!empty($filters['category'])) {
            $this->db->where('e.category', $filters['category']);
        }

        if (!empty($filters['payment_status'])) {
            $this->db->where('e.payment_status', $filters['payment_status']);
        }

        if (!empty($filters['date_from'])) {
            $this->db->where('e.expense_date >=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $this->db->where('e.expense_date <=', $filters['date_to']);
        }

        if (!empty($search)) {
            $this->db->group_start()
                ->like('e.title', $search)
                ->or_like('e.vendor', $search)
                ->or_like('e.notes', $search)
                ->group_end();
        }

        return $this->db
            ->order_by('e.expense_date', 'DESC')
            ->order_by('e.id', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_expense($id)
    {
        return $this->db
            ->where('id', (int) $id)
            ->get($this->table)
            ->row_array();
    }

    public function create_expense($data)
    {
        $this->db->insert($this->table, $this->clean($data));
        return $this->db->insert_id();
    }

    public function update_expense($id, $data)
    {
        return $this->db
            ->where('id', (int) $id)
            ->update($this->table, $this->clean($data));
    }

    public function delete_expense($id)
    {
        return $this->db
            ->where('id', (int) $id)
            ->delete($this->table);
    }

    public function total_amount($filters = [])
    {
        if (!empty($filters['month'])) {
            $this->db->where('MONTH(expense_date)', $filters['month']);
        }

        if (!empty($filters['year'])) {
            $this->db->where('YEAR(expense_date)', $filters['year']);
        }

        if (!empty($filters['payment_status'])) {
            $this->db->where('payment_status', $filters['payment_status']);
        }

        $row = $this->db
            ->select_sum('amount')
            ->get($this->table)
            ->row_array();

        return (float) ($row['amount'] ?? 0);
    }

    public function count_by_status($status)
    {
        return $this->db
            ->where('payment_status', $status)
            ->count_all_results($this->table);
    }

    private function clean($data)
    {
        $allowed = [
            'title',
            'category',
            'amount',
            'expense_date',
            'payment_mode',
            'payment_status',
            'vendor',
            'notes',
            'created_by'
        ];

        return array_intersect_key($data, array_flip($allowed));
    }
}
