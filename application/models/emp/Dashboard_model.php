<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{


    public function get_user($id)
    {
        return $this->db->where('id', $id)->get('users')->row();
    }

    public function get_user_photo($id)
    {
        return $this->db->select('photo')
            ->where('id', $id)
            ->get('users')
            ->row()->photo ?? null;
    }

    public function update_user($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }



    public function add_break($data)
    {
        return $this->db->insert('break_logs', $data);
    }

 public function today_breaks()
{
    return $this->db
        ->select('users.name, break_logs.reason')
        ->from('break_logs')
        ->join('users', 'users.id = break_logs.user_id')
        ->where('DATE(break_logs.start_time)', date('Y-m-d'))
        ->where('break_logs.end_time IS NULL', null, false)   // ⭐ ONLY RUNNING BREAK
        ->get()
        ->result();
}


public function get_today_breaks($user_id)
{
    $today = date('Y-m-d');

    return $this->db
        ->from('break_logs')
        ->where('user_id', $user_id)
        ->where('DATE(start_time)', $today)
        ->get()
        ->result();
}

    public function get_today_break_summary($user_id)
    {
        return $this->db->query("
            SELECT 
                COUNT(*) AS total_breaks,
                COALESCE(SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)),0) AS total_seconds
            FROM break_logs
            WHERE user_id=?
              AND DATE(start_time)=CURDATE()
        ", [$user_id])->row();
    }



    public function start_work($user_id)
    {
       $today = date('Y-m-d');

$already = $this->db
    ->where('user_id', $user_id)
    ->where('DATE(start_time)', $today)
    ->where('end_time IS NULL', null, false)
    ->get('work_logs')
    ->row();

if ($already) {
    return false; // already running
}

return $this->db->insert('work_logs', [
    'user_id' => $user_id,
    'start_time' => date('Y-m-d H:i:s')
]);
    }



    public function stop_work($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->where('end_time IS NULL', null, false)
            ->order_by('id', 'ASC')
            ->limit(1)
            ->update('work_logs', [
                'end_time' => date('Y-m-d H:i:s')
            ]);
    }


    public function get_hourly_work($user_id)
    {
        return $this->db->query("
        SELECT 
            DATE(start_time) as work_date,
            TIME(start_time) as start_time,
            TIME(end_time) as end_time,
            TIMESTAMPDIFF(SECOND, start_time, end_time) as total_seconds
        FROM work_logs
        WHERE user_id = ?
          AND end_time IS NOT NULL
          AND DATE(start_time) = CURDATE()
        ORDER BY start_time ASC
    ", [$user_id])->result();
    }

    public function get_hourly_logs($user_id)
    {
        $today = date('Y-m-d');

        return $this->db
            ->select("
            start_time,
            end_time,
            TIMESTAMPDIFF(SECOND, start_time, end_time) as total_seconds
        ")
            ->from('work_logs')
            ->where('user_id', $user_id)
            ->where('DATE(start_time)', $today)
            ->where('end_time IS NOT NULL', null, false)
            ->order_by('start_time', 'ASC')
            ->get()
            ->result();
    }


    public function get_today_work_total($user_id)
    {
        $row = $this->db->query("
            SELECT COALESCE(SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)),0) AS total_seconds
            FROM work_logs
            WHERE user_id=?
              AND DATE(start_time)=CURDATE()
              AND end_time IS NOT NULL
        ", [$user_id])->row();

        return (int) $row->total_seconds;
    }



    // public function today_breaks()
    // {
    //     $this->db->select('users.name, break_logs.reason, break_logs.start_time');
    //     $this->db->from('break_logs');
    //     $this->db->join('users', 'users.id = break_logs.user_id');
    //     $this->db->where('DATE(break_logs.start_time)', date('Y-m-d'));
    //     $this->db->order_by('break_logs.start_time', 'DESC');

    //     return $this->db->get()->result();
    // }

    public function get_all_employees()
    {
        return $this->db
            ->select('id,name, designation, photo')
            ->from('users')
            ->where('role', 0)
            ->get()
            ->result();
    }

    public function get_upcoming_birthdays()
    {
        return $this->db->query("
    SELECT name, dob, photo
    FROM users
    WHERE role = 0
    AND dob IS NOT NULL
    AND
    (
        (
            DATE_FORMAT(dob,'%m-%d')
            BETWEEN
            DATE_FORMAT(CURDATE(),'%m-%d')
            AND
            DATE_FORMAT(DATE_ADD(CURDATE(),INTERVAL 7 DAY),'%m-%d')
        )
        OR
        (
            DATE_FORMAT(CURDATE(),'%m-%d') >
            DATE_FORMAT(DATE_ADD(CURDATE(),INTERVAL 7 DAY),'%m-%d')
            AND
            (
                DATE_FORMAT(dob,'%m-%d') >= DATE_FORMAT(CURDATE(),'%m-%d')
                OR
                DATE_FORMAT(dob,'%m-%d') <= DATE_FORMAT(DATE_ADD(CURDATE(),INTERVAL 7 DAY),'%m-%d')
            )
        )
    )
    ORDER BY DATE_FORMAT(dob,'%m-%d')
    ")->result();
    }

    public function get_task_counts($user_id)
    {
        $data = [];

        $statuses = ['pending', 'in_progress', 'completed'];

        foreach ($statuses as $status) {
            // IMPORTANT: using assigned_to instead of user_id
            $this->db->where('assigned_to', $user_id);
            $this->db->where('status', $status);

            $data[$status] = $this->db->count_all_results('tasks');
        }

        return $data;
    }

    public function get_today_tasks($user_id)
    {
        $today = date('Y-m-d');

        $this->db->where('assigned_to', $user_id);
        $this->db->where('DATE(created_at)', $today);

        return $this->db->count_all_results('tasks');
    }

    public function get_performance_summary()
    {
        $on_time = $this->db
            ->where('performance', 'on_time')
            ->count_all_results('task_history');

        $delayed = $this->db
            ->where('performance', 'delayed')
            ->count_all_results('task_history');

        $total = $on_time + $delayed;

        $rate = $total > 0 ? round(($on_time / $total) * 100) : 0;

        return [
            'on_time' => $on_time,
            'delayed' => $delayed,
            'rate' => $rate
        ];
    }

    public function get_user_performance()
    {
        $row = $this->db->query("
        SELECT 
            SUM(CASE WHEN performance='on_time' THEN 1 ELSE 0 END) AS on_time,
            SUM(CASE WHEN performance='delayed' THEN 1 ELSE 0 END) AS delayed_count,
            COUNT(*) AS total
        FROM task_history
    ")->row();

        $total = (int) $row->total;

        $rate = $total > 0
            ? round(($row->on_time / $total) * 100)
            : 0;

        return [
            'on_time' => (int) $row->on_time,
            'delayed' => (int) $row->delayed_count,
            'rate' => $rate
        ];
    }
}
