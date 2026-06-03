<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{
    public function get_all_projects()
    {
        return $this->db->query("
            SELECT
                p.*,
                COALESCE(req.requirements_amount, 0) AS requirements_amount,
                COALESCE(pay.paid_amount, 0) AS paid_amount,
                (COALESCE(p.base_amount, 0) + COALESCE(req.requirements_amount, 0)) AS total_amount,
                ((COALESCE(p.base_amount, 0) + COALESCE(req.requirements_amount, 0)) - COALESCE(pay.paid_amount, 0)) AS remaining_amount
            FROM projects p
            LEFT JOIN (
                SELECT project_id, SUM(amount) AS requirements_amount
                FROM project_requirements
                GROUP BY project_id
            ) req ON req.project_id = p.id
            LEFT JOIN (
                SELECT project_id, SUM(amount) AS paid_amount
                FROM project_payment_logs
                GROUP BY project_id
            ) pay ON pay.project_id = p.id
            ORDER BY p.id DESC
        ")->result();
    }

    public function insert_project($data)
    {
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function get_project($id)
    {
        return $this->db->get_where('projects', ['id' => $id])->row();
    }

    public function update_project($id, $data)
    {
        return $this->db->where('id', $id)->update('projects', $data);
    }

    public function get_project_summary($id)
    {
        return $this->db->query("
            SELECT
                p.*,
                COALESCE(req.requirements_amount, 0) AS requirements_amount,
                COALESCE(pay.paid_amount, 0) AS paid_amount,
                (COALESCE(p.base_amount, 0) + COALESCE(req.requirements_amount, 0)) AS total_amount,
                ((COALESCE(p.base_amount, 0) + COALESCE(req.requirements_amount, 0)) - COALESCE(pay.paid_amount, 0)) AS remaining_amount
            FROM projects p
            LEFT JOIN (
                SELECT project_id, SUM(amount) AS requirements_amount
                FROM project_requirements
                GROUP BY project_id
            ) req ON req.project_id = p.id
            LEFT JOIN (
                SELECT project_id, SUM(amount) AS paid_amount
                FROM project_payment_logs
                GROUP BY project_id
            ) pay ON pay.project_id = p.id
            WHERE p.id = ?
        ", [(int) $id])->row();
    }

    public function get_project_requirements($project_id)
    {
        return $this->db
            ->where('project_id', (int) $project_id)
            ->order_by('id', 'DESC')
            ->get('project_requirements')
            ->result();
    }

    public function insert_requirement($data)
    {
        return $this->db->insert('project_requirements', $data);
    }

    public function get_payment_logs($project_id = null)
    {
        $this->db
            ->select('pl.*, p.project_name, p.client_name')
            ->from('project_payment_logs pl')
            ->join('projects p', 'p.id = pl.project_id', 'left');

        if ($project_id !== null) {
            $this->db->where('pl.project_id', (int) $project_id);
        }

        return $this->db
            ->order_by('pl.payment_date', 'DESC')
            ->order_by('pl.id', 'DESC')
            ->get()
            ->result();
    }

    public function insert_payment_log($data)
    {
        return $this->db->insert('project_payment_logs', $data);
    }

    public function get_transactions()
    {
        return $this->db
            ->select('t.*, p.project_name')
            ->from('transactions t')
            ->join('projects p', 'p.id = t.project_id', 'left')
            ->order_by('t.transaction_date', 'DESC')
            ->order_by('t.id', 'DESC')
            ->get()
            ->result();
    }

    public function insert_transaction($data)
    {
        return $this->db->insert('transactions', $data);
    }

    public function delete_transaction($id)
    {
        return $this->db
            ->where('id', (int) $id)
            ->delete('transactions');
    }


    public function get_projects_by_user($user_id)
    {
        return $this->db
            ->select('projects.id, projects.project_name, users.name as user_name')
            ->from('projects')
            ->join('users', 'users.id = projects.user_id', 'left')
            ->where('projects.user_id', $user_id)
            ->order_by('projects.id', 'DESC')
            ->get()
            ->result();
    }

    public function delete_project($project_id)
    {
        // 1️⃣ Get task IDs first
        $task_ids = $this->db
            ->select('id')
            ->from('tasks')
            ->where('project_id', $project_id)
            ->get()
            ->result_array();

        $task_ids = array_column($task_ids, 'id');

        if (!empty($task_ids)) {

            // 2️⃣ Delete work logs
            $this->db->where_in('task_id', $task_ids)->delete('task_work_logs');

            // 3️⃣ Delete task history
            $this->db->where_in('task_id', $task_ids)->delete('task_history');
        }

        // 4️⃣ Delete tasks
        $this->db->where('project_id', $project_id)->delete('tasks');
        $this->db->where('project_id', $project_id)->delete('project_requirements');
        $this->db->where('project_id', $project_id)->delete('project_payment_logs');

        // 5️⃣ Delete project
        return $this->db->where('id', $project_id)->delete('projects');
    }





    public function get_tasks_by_project($project_id)
    {
        $tasks = $this->db->query("
        SELECT 
            t.*,
            u.name AS assigned_user,

            IFNULL(h.expected_minutes, t.expected_minutes) AS expected_minutes,
            IFNULL(h.total_minutes, t.total_minutes) AS total_minutes,

            (
                SELECT IFNULL(SUM(duration_seconds),0)
                FROM task_work_logs
                WHERE task_id = t.id
            ) AS total_seconds,

            h.performance

        FROM tasks t

        LEFT JOIN users u 
            ON u.id = t.assigned_to

        LEFT JOIN task_history h 
            ON h.id = (
                SELECT id 
                FROM task_history 
                WHERE task_id = t.id 
                ORDER BY completed_at DESC 
                LIMIT 1
            )

        WHERE t.project_id = ?

        ORDER BY t.id DESC
    ", [$project_id])->result();

        // ✅ FINAL PERFORMANCE CALCULATION (SECONDS BASED)
        foreach ($tasks as $t) {

            $expectedSeconds = ((int) $t->expected_minutes) * 60;
            $workedSeconds = (int) $t->total_seconds;

            if ($expectedSeconds > 0 || $workedSeconds > 0) {

                $t->performance =
                    ($workedSeconds <= $expectedSeconds)
                    ? 'on_time'
                    : 'delayed';

            } else {
                $t->performance = null;
            }
        }

        return $tasks;
    }







    public function get_logs_by_task($task_id)
    {
        return $this->db->query("
        SELECT 
            u.name AS user_name,
            p.project_name,
            t.title AS task_title,
            t.status AS task_status,
            w.start_time,
            w.end_time,
            w.status,
            IFNULL(SEC_TO_TIME(w.duration_seconds),'00:00:00') AS total_time
        FROM task_work_logs w
        LEFT JOIN tasks t ON t.id = w.task_id
        LEFT JOIN projects p ON p.id = w.project_id
        LEFT JOIN users u ON u.id = w.user_id
        WHERE w.task_id = ?
        ORDER BY w.id DESC
    ", [$task_id])->result();
    }
}
