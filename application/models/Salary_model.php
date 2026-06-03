<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary_model extends CI_Model
{
    private $table = 'salary_payments';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get statistics for salary dashboard
     */
    public function get_stats($month_year)
    {
        // 1. Total active developers
        $total_devs = $this->db
            ->where('role', 0)
            ->where('is_active', 1)
            ->count_all_results('users');

        // 2. Total salary paid (all time)
        $total_paid = $this->db
            ->select_sum('amount')
            ->get($this->table)
            ->row()
            ->amount ?? 0.00;

        // 3. Monthly salary paid (this month)
        $monthly_paid = $this->db
            ->select_sum('amount')
            ->where('month_year', $month_year)
            ->get($this->table)
            ->row()
            ->amount ?? 0.00;

        // 4. Pending salaries this month
        // We find active developers who DO NOT have a payment in this month
        $paid_user_ids_query = $this->db
            ->select('user_id')
            ->where('month_year', $month_year)
            ->get($this->table)
            ->result_array();
        
        $paid_user_ids = array_column($paid_user_ids_query, 'user_id');

        $this->db->where('role', 0)->where('is_active', 1);
        if (!empty($paid_user_ids)) {
            $this->db->where_not_in('id', $paid_user_ids);
        }
        $pending_count = $this->db->count_all_results('users');

        return [
            'total_devs' => $total_devs,
            'total_paid' => $total_paid,
            'monthly_paid' => $monthly_paid,
            'pending_count' => $pending_count
        ];
    }

    /**
     * Get list of developers with their base salaries, payment status, 
     * present/absent days, total paid all time, and last payment date for the selected month.
     */
    public function get_developers_overview($month_year)
    {
        // Fetch all active developers
        $devs = $this->db
            ->where('role', 0)
            ->where('is_active', 1)
            ->order_by('name', 'ASC')
            ->get('users')
            ->result_array();

        foreach ($devs as &$d) {
            // Count present days
            $d['present_days'] = $this->db
                ->where('user_id', $d['id'])
                ->where('status', 'Present')
                ->like('attendance_date', $month_year, 'after')
                ->count_all_results('attendance');

            // Count absent days
            $d['absent_days'] = $this->db
                ->where('user_id', $d['id'])
                ->where('status', 'Absent')
                ->like('attendance_date', $month_year, 'after')
                ->count_all_results('attendance');

            // Total paid all time
            $d['total_paid'] = $this->db
                ->select_sum('amount')
                ->where('user_id', $d['id'])
                ->get($this->table)
                ->row()
                ->amount ?? 0.00;

            // Last payment details
            $last_pay = $this->db
                ->where('user_id', $d['id'])
                ->order_by('payment_date', 'DESC')
                ->limit(1)
                ->get($this->table)
                ->row_array();

            $d['last_payment_date'] = $last_pay ? $last_pay['payment_date'] : null;

            // Payment status this month
            $has_pay = $this->db
                ->where('user_id', $d['id'])
                ->where('month_year', $month_year)
                ->count_all_results($this->table);

            $d['payment_status'] = $has_pay > 0 ? 'Paid' : 'Pending';
        }

        return $devs;
    }

    /**
     * Get specific developer stats (present/absent days, base salary) for modal AJAX
     */
    public function get_developer_stats($user_id, $month_year)
    {
        $user = $this->db->where('id', $user_id)->get('users')->row_array();
        if (!$user) return null;

        $present = $this->db
            ->where('user_id', $user_id)
            ->where('status', 'Present')
            ->like('attendance_date', $month_year, 'after')
            ->count_all_results('attendance');

        $absent = $this->db
            ->where('user_id', $user_id)
            ->where('status', 'Absent')
            ->like('attendance_date', $month_year, 'after')
            ->count_all_results('attendance');

        return [
            'base_salary' => $user['monthly_salary'] ?? 0.00,
            'present_days' => $present,
            'absent_days' => $absent
        ];
    }

    /**
     * Get payment history logs
     */
    public function get_payments_history()
    {
        return $this->db
            ->select('sp.*, u.name as developer_name, u.email as developer_email, u.photo as developer_photo')
            ->from($this->table . ' sp')
            ->join('users u', 'u.id = sp.user_id', 'left')
            ->order_by('sp.payment_date', 'DESC')
            ->order_by('sp.id', 'DESC')
            ->get()
            ->result_array();
    }

    /**
     * Add a salary payment
     */
    public function add_payment($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Delete a salary payment
     */
    public function delete_payment($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    /**
     * Update developer's base monthly salary
     */
    public function update_base_salary($user_id, $monthly_salary)
    {
        return $this->db
            ->where('id', $user_id)
            ->where('role', 0)
            ->update('users', ['monthly_salary' => $monthly_salary]);
    }
}
