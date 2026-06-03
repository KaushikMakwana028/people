<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{


    public function insert_task($data)
    {
        return $this->db->insert('tasks', $data);
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function get_user_by_id($id)
    {
        return $this->db->where('id', $id)->get('users')->row();
    }

    public function get_all_users()
    {
        return $this->db->get('users')->result();
    }

    public function delete_user($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }

    public function get_user_photo($id)
    {
        $row = $this->db->select('photo')->where('id', $id)->get('users')->row();
        return $row ? $row->photo : null;
    }

    public function get_all_tasks()
    {
        return $this->db
            ->select('tasks.*, projects.project_name,
                      u1.name AS user_name,
                      u2.name AS assigned_by_name')
            ->from('tasks')
            ->join('projects', 'projects.id = tasks.project_id', 'left')
            ->join('users u1', 'u1.id = tasks.assigned_to', 'left')
            ->join('users u2', 'u2.id = tasks.assigned_by', 'left')
            ->order_by('tasks.id', 'DESC')
            ->get()
            ->result();

        $this->db->insert('task_history', [
            'task_id' => $task_id,
            'expected_minutes' => 0,
            'total_minutes' => 0,
            'performance' => null
        ]);
    }

    public function get_task_by_id($id)
    {
        return $this->db->where('id', $id)->get('tasks')->row();
    }





    public function update_task($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('tasks', $data);
    }


    public function delete_task($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('tasks');
    }




















    /* ===============================
       FETCH USER TASKS
    =============================== */
    public function get_user_tasks($user_id)
    {
        return $this->db
            ->select('
            tasks.*,
            projects.project_name,

            (
                SELECT IFNULL(SUM(duration_seconds),0)
                FROM task_work_logs
                WHERE task_id = tasks.id
            ) AS total_seconds
        ')
            ->from('tasks')
            ->join('projects', 'projects.id = tasks.project_id', 'left')
            ->where('tasks.assigned_to', $user_id)
            ->order_by('tasks.id', 'DESC')
            ->get()
            ->result();
    }


    /* ===============================
       START TASK
    =============================== */

    public function start_task($task_id, $user_id)
    {
        $task = $this->db->where('id', $task_id)->get('tasks')->row();
        if (!$task)
            return false;

        $running = $this->db
            ->where('user_id', $user_id)
            ->where('end_time IS NULL', null, false)
            ->get('task_work_logs')
            ->row();

        if ($running) {
            $end = date('Y-m-d H:i:s');
            $seconds = strtotime($end) - strtotime($running->start_time);

            $this->db->where('id', $running->id)->update('task_work_logs', [
                'end_time' => $end,
                'duration_seconds' => $seconds
            ]);


            $this->db->where('id', $running->task_id)->update('tasks', [
                'status' => 'pending'
            ]);
        }


        $this->db->insert('task_work_logs', [
            'task_id' => $task_id,
            'project_id' => $task->project_id,
            'user_id' => $user_id,
            'start_time' => date('Y-m-d H:i:s'),
            'status' => 'running'
        ]);



        $this->db->where('id', $task_id)->update('tasks', [
            'status' => 'in_progress'
        ]);

        return true;
    }



    public function stop_task_log($task_id, $user_id)
    {
        $log = $this->db
            ->where('task_id', $task_id)
            ->where('user_id', $user_id)
            ->where('end_time IS NULL', null, false)
            ->get('task_work_logs')
            ->row();

        if (!$log)
            return false;

        $end = date('Y-m-d H:i:s');
        $seconds = strtotime($end) - strtotime($log->start_time);

        $this->db->where('id', $log->id)->update('task_work_logs', [
            'end_time' => $end,
            'duration_seconds' => $seconds
        ]);

        $this->db->where('id', $task_id)->update('tasks', [
            'status' => 'pending'
        ]);

        return true;
    }



    /* ===============================
       STOP TASK
    =============================== */
    public function stop_task($task_id, $user_id)
    {
        $log = $this->db->where([
            'task_id' => $task_id,
            'user_id' => $user_id,
            'status' => 'running'
        ])->get('task_work_logs')->row();

        if (!$log)
            return false;

        $end = date('Y-m-d H:i:s');
        $seconds = strtotime($end) - strtotime($log->start_time);

        $this->db->where('id', $log->id)->update('task_work_logs', [
            'end_time' => $end,
            'duration_seconds' => $seconds,
            'status' => 'stopped'
        ]);

        $this->db->where('id', $task_id)->update('tasks', [
            'status' => 'pending'
        ]);

        return true;
    }


    public function get_total_worked_seconds($task_id)
    {
        $row = $this->db
            ->select('SUM(duration_seconds) AS total_seconds')
            ->from('task_work_logs')
            ->where('task_id', $task_id)
            ->where('status', 'stopped')
            ->get()
            ->row();

        return (int) ($row->total_seconds ?? 0);
    }







    public function get_task_details_with_logs($task_id, $user_id)
    {
        // Task details
        $task = $this->db
            ->select('tasks.*, projects.project_name')
            ->from('tasks')
            ->join('projects', 'projects.id = tasks.project_id', 'left')
            ->where('tasks.id', $task_id)
            ->get()
            ->row();

        if (!$task) {
            return false;
        }

        // ✅ ONLY LOGGED-IN USER LOGS
        $logs = $this->db
            ->select('
            task_work_logs.*,
            users.name AS user_name,
            tasks.title AS task_title,
            projects.project_name
        ')
            ->from('task_work_logs')
            ->join('users', 'users.id = task_work_logs.user_id', 'left')
            ->join('tasks', 'tasks.id = task_work_logs.task_id', 'left')
            ->join('projects', 'projects.id = task_work_logs.project_id', 'left')
            ->where('task_work_logs.task_id', $task_id)
            ->where('task_work_logs.user_id', $user_id) // 🔥 KEY LINE
            ->order_by('task_work_logs.start_time', 'DESC')
            ->get()
            ->result();

        return [
            'task' => $task,
            'logs' => $logs
        ];
    }





    /* ===============================
       COMPLETE TASK
    =============================== */
    public function complete_task($task_id)
    {
        $task = $this->db->get_where('tasks', ['id' => $task_id])->row();
        if (!$task)
            return false;

        // 1️⃣ Stop running log
        $runningLog = $this->db
            ->where('task_id', $task_id)
            ->where('status', 'running')
            ->get('task_work_logs')
            ->row();

        if ($runningLog) {
            $end = date('Y-m-d H:i:s');
            $seconds = strtotime($end) - strtotime($runningLog->start_time);

            $this->db->where('id', $runningLog->id)->update('task_work_logs', [
                'end_time' => $end,
                'duration_seconds' => $seconds,
                'status' => 'stopped'
            ]);
        }

        // 2️⃣ Sum all worked time
        $totalSeconds = $this->db
            ->select_sum('duration_seconds')
            ->where('task_id', $task_id)
            ->get('task_work_logs')
            ->row()
            ->duration_seconds ?? 0;

        $totalMinutes = floor($totalSeconds / 60);
        $totalSeconds = floor($totalSeconds / 60);

        // 3️⃣ Decide performance
        $performance = ($totalMinutes <= $task->expected_minutes)
            ? 'on_time'
            : 'delayed';

        // 4️⃣ Update task
        $this->db->where('id', $task_id)->update('tasks', [
            'total_minutes' => $totalMinutes,
            'status' => 'completed',
            'completed_at' => date('Y-m-d H:i:s')
        ]);

        // 5️⃣ Save history
        $this->db->insert('task_history', [
            'task_id' => $task_id,
            'user_id' => $task->assigned_to,
            'expected_minutes' => $task->expected_minutes,
            'total_minutes' => $totalMinutes,
            'performance' => $performance,
            'completed_at' => date('Y-m-d H:i:s')
        ]);

        return true;
    }







    public function get_user_task_history($user_id)
    {
        return $this->db
            ->select('
            task_history.*,
            tasks.title,
            users.name,
            users.email
        ')
            ->from('task_history')
            ->join('tasks', 'tasks.id = task_history.task_id')
            ->join('users', 'users.id = task_history.user_id')
            ->where('task_history.user_id', $user_id)
            ->order_by('task_history.completed_at', 'DESC')
            ->get()
            ->result();
    }



    /* =====================================================
       🔥 ADDITION 1: ADMIN – ALL TASK HISTORY
    ===================================================== */

    public function get_all_task_history()
    {
        return $this->db
            ->select('task_history.*, tasks.title, users.name, users.email')
            ->from('task_history')
            ->join('tasks', 'tasks.id = task_history.task_id')
            ->join('users', 'users.id = task_history.user_id')
            ->order_by('task_history.completed_at', 'DESC')
            ->get()
            ->result();
    }

    /* =====================================================
       🔥 ADDITION 2: ADMIN – TOTAL TIME REPORT
    ===================================================== */

    public function get_total_time_by_user()
    {
        return $this->db
            ->select('users.name, users.email,
                      SUM(tasks.total_minutes) AS total_minutes')
            ->from('tasks')
            ->join('users', 'users.id = tasks.assigned_to')
            ->group_by('tasks.assigned_to')
            ->get()
            ->result();
    }

    /* =====================================================
        ADDITION 3: HELPER – FORMAT TIME
    ===================================================== */

    public function format_minutes($minutes)
    {
        $h = floor($minutes / 60);
        $m = $minutes % 60;
        return "{$h}h {$m}m";
    }

    /* =====================================================
      RECENT COMPLETED TASKS (DASHBOARD)
    ==================================================== */
    public function get_recent_completed_tasks($limit = 7)
    {
        return $this->db
            ->select('
            tasks.id,
            tasks.title,
            tasks.completed_at,
            tasks.total_minutes,
            tasks.expected_minutes,
            projects.project_name,
            users.name AS user_name
        ')
            ->from('tasks')
            ->join('projects', 'projects.id = tasks.project_id', 'left')
            ->join('users', 'users.id = tasks.assigned_to', 'left')
            ->where('tasks.status', 'completed')
            ->where('tasks.completed_at IS NOT NULL', null, false)
            ->order_by('tasks.completed_at', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function get_task_with_user($task_id)
    {
        return $this->db
            ->select('tasks.*, users.name AS user_name')
            ->from('tasks')
            ->join('users', 'users.id = tasks.assigned_to')
            ->where('tasks.id', $task_id)
            ->get()
            ->row();
    }


    public function get_tasks($assigned_to = null)
    {
        $this->db->select('
        tasks.*,
        users.name AS user_name,
        projects.project_name
    ');
        $this->db->from('tasks');
        $this->db->join('projects', 'projects.id = tasks.project_id', 'left');

        // APPLY FILTER
        if (!empty($assigned_to)) {
            $this->db->where('tasks.assigned_to', $assigned_to);
        }

        $this->db->order_by('tasks.id', 'DESC');


        return $this->db->get()->result();
    }

    public function get_running_log($task_id)
    {
        return $this->db
            ->where('task_id', $task_id)
            ->where('end_time IS NULL', null, false)
            ->get('task_work_logs')
            ->row();
    }
    public function get_running_log_by_user($task_id, $user_id)
    {
        return $this->db
            ->where('task_id', $task_id)
            ->where('user_id', $user_id)
            ->where('end_time IS NULL', null, false)
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get('task_work_logs')
            ->row();
    }

    // 🔥 ALL LOGS OF A TASK
    public function start_task_log($task_id, $user_id)
    {
        // get task with project
        $task = $this->db
            ->select('id, project_id')
            ->where('id', $task_id)
            ->get('tasks')
            ->row();

        if (!$task)
            return false;

        // stop any running log of this user
        $this->db->where([
            'user_id' => $user_id,
            'end_time' => NULL
        ])->update('task_work_logs', [
                    'end_time' => date('Y-m-d H:i:s'),
                    'duration_seconds' => 0
                ]);

        // insert NEW log with project & task
        return $this->db->insert('task_work_logs', [
            'task_id' => $task->id,
            'project_id' => $task->project_id,
            'user_id' => $user_id,
            'start_time' => date('Y-m-d H:i:s')
        ]);
    }


    public function get_task_logs_full($task_id)
    {
        return $this->db
            ->select('
            task_work_logs.*,
            users.name AS user_name,
            tasks.title AS task_title,
            projects.project_name
        ')
            ->from('task_work_logs') // ✅ CORRECT TABLE
            ->join('users', 'users.id = task_work_logs.user_id', 'left')
            ->join('tasks', 'tasks.id = task_work_logs.task_id', 'left')
            ->join('projects', 'projects.id = task_work_logs.project_id', 'left')
            ->where('task_work_logs.task_id', $task_id)
            ->order_by('task_work_logs.start_time', 'DESC')
            ->get()
            ->result();
    }

    public function get_tasks_by_project_and_user($project_id, $user_id)
    {
        return $this->db
            ->where('project_id', $project_id)
            ->where('assigned_to', $user_id)
            ->get('tasks')
            ->result();
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

        // FINAL PERFORMANCE CALCULATION
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


    public function get_running_task_by_user($user_id)
    {
        return $this->db
            ->select('tasks.id, tasks.title')
            ->from('task_work_logs')
            ->join('tasks', 'tasks.id = task_work_logs.task_id')
            ->where('task_work_logs.user_id', $user_id)
            ->where('task_work_logs.end_time IS NULL', null, false)
            ->order_by('task_work_logs.id', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }


    public function get_tasks_by_project_user($project_id, $user_id)
    {
        return $this->db
            ->where('project_id', $project_id)
            ->where('assigned_to', $user_id)
            ->get('tasks')
            ->result();
    }



    public function get_projects_by_user($user_id)
    {
        return $this->db
            ->select('projects.id, projects.project_name')
            ->from('tasks')
            ->join('projects', 'projects.id = tasks.project_id')
            ->where('tasks.assigned_to', $user_id)
            ->group_by('projects.id')
            ->get()
            ->result();
    }
}
