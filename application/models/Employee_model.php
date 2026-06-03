<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public function insert_employee($data)
    {
        return $this->db->insert('employees', $data);
    }

    public function get_all_employees()
    {
        return $this->db->get('employees')->result();
    }

    public function get_employee_performance($emp_id)
    {
        $data = [];

        // Completed tasks
        $data['completed'] = $this->db
            ->where('assigned_to', $emp_id)
            ->where('status', 'completed')
            ->count_all_results('tasks');

        // Pending tasks
        $data['pending'] = $this->db
            ->where('assigned_to', $emp_id)
            ->where('status', 'pending')
            ->count_all_results('tasks');

        // On time (actual <= expected)
        $data['ontime'] = $this->db
            ->where('assigned_to', $emp_id)
            ->where('total_minutes <= expected_minutes', null, false)
            ->count_all_results('tasks');

        // Delayed (actual > expected)
        $data['delayed'] = $this->db
            ->where('assigned_to', $emp_id)
            ->where('total_minutes > expected_minutes', null, false)
            ->count_all_results('tasks');

        return $data;
    }
}
