<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

    public function already_marked_today($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->where('DATE(created_at)', date('Y-m-d'))
            ->get('attendance')
            ->row();
    }

    public function mark_attendance($data)
    {
        return $this->db->insert('attendance', $data);
    }

    public function get_my_attendance($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('created_at','DESC')
            ->get('attendance')
            ->result();
    }

    public function get_my_attendance_by_month($user_id, $month)
{
    return $this->db
        ->where('user_id', $user_id)
        ->like('attendance_date', $month, 'after') 
        ->order_by('attendance_date', 'DESC')
        ->get('attendance')
        ->result();
}


public function get_monthly_summary($user_id, $year, $month)
{
    $this->db->select("
        SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) as present_count,
        SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) as absent_count
    ");
    $this->db->where('user_id', $user_id);
    $this->db->where('YEAR(attendance_date)', $year);
    $this->db->where('MONTH(attendance_date)', $month);

    return $this->db->get('attendance')->row();
}

public function get_monthly_attendance($user_id, $year, $month)
{
    return $this->db
        ->where('user_id', $user_id)
        ->where('YEAR(attendance_date)', $year)
        ->where('MONTH(attendance_date)', $month)
        ->order_by('attendance_date', 'DESC')
        ->get('attendance')
        ->result();
}



// public function get_employee_attendance_summary($month, $year)
// {
//     $sql = "
//         SELECT 
//             u.id,
//             u.name AS emp_name,
//             SUM(CASE WHEN a.status = 'Present' THEN 1 ELSE 0 END) AS present_count,
//             SUM(CASE WHEN a.status = 'Absent' THEN 1 ELSE 0 END) AS absent_count
//         FROM users u
//         LEFT JOIN attendance a 
//             ON a.user_id = u.id
//             AND MONTH(a.created_at) = ?
//             AND YEAR(a.created_at) = ?
//         WHERE u.role = 'emp'
//         GROUP BY u.id
//         ORDER BY u.name ASC
//     ";

//     return $this->db->query($sql, [$month, $year])->result();
// }

    public function auto_mark_absents($force = false)
    {
        $check_file = FCPATH . 'uploads/last_attendance_check.txt';
        if (!$force && file_exists($check_file) && trim(file_get_contents($check_file)) === date('Y-m-d')) {
            return;
        }

        // Fetch all active employees (role = 0)
        $employees = $this->db
            ->where('role', 0)
            ->where('is_active', 1)
            ->get('users')
            ->result();

        // Fetch all holidays
        $holidays_raw = $this->db->get('holidays')->result();
        $holidays = [];
        foreach ($holidays_raw as $h) {
            $holidays[$h->holiday_date] = true;
        }

        // Loop through employees
        foreach ($employees as $emp) {
            $emp_id = $emp->id;
            
            // Determine start date for this employee
            $start_date_str = !empty($emp->created_at) ? date('Y-m-d', strtotime($emp->created_at)) : date('Y-m-d', strtotime('-30 days'));
            
            // Limit start date to at most 30 days ago to prevent huge loops for old employees
            $limit_date = date('Y-m-d', strtotime('-30 days'));
            if ($start_date_str < $limit_date) {
                $start_date_str = $limit_date;
            }

            $yesterday_str = date('Y-m-d', strtotime('-1 day'));

            if ($start_date_str > $yesterday_str) {
                continue; // employee created today or in future
            }

            // Fetch all existing attendance dates for this employee in this range
            $existing_attendance_raw = $this->db
                ->select('attendance_date')
                ->where('user_id', $emp_id)
                ->where('attendance_date >=', $start_date_str)
                ->where('attendance_date <=', $yesterday_str)
                ->get('attendance')
                ->result();
            
            $existing_dates = [];
            foreach ($existing_attendance_raw as $att) {
                $existing_dates[$att->attendance_date] = true;
            }

            // Fetch approved full-day leaves for this employee in this range
            $leaves_raw = $this->db
                ->select('leave_date')
                ->where('user_id', $emp_id)
                ->where('status', 'Approved')
                ->where('leave_type', 'full_day')
                ->where('leave_date >=', $start_date_str)
                ->where('leave_date <=', $yesterday_str)
                ->get('leaves')
                ->result();
            
            $approved_leaves = [];
            foreach ($leaves_raw as $lv) {
                $approved_leaves[$lv->leave_date] = true;
            }

            // Loop through each day from start_date to yesterday
            $current = strtotime($start_date_str);
            $end = strtotime($yesterday_str);

            while ($current <= $end) {
                $date_str = date('Y-m-d', $current);
                $day_of_week = date('N', $current); // 1 (Mon) - 7 (Sun)

                $current = strtotime('+1 day', $current);

                // Check conditions:
                // 1. Weekend (Saturday = 6, Sunday = 7)
                if ($day_of_week == 6 || $day_of_week == 7) {
                    continue;
                }

                // 2. Holiday in database
                if (isset($holidays[$date_str])) {
                    continue;
                }

                // 3. Approved full-day leave
                if (isset($approved_leaves[$date_str])) {
                    continue;
                }

                // 4. Already has attendance record (Present/Absent/etc)
                if (isset($existing_dates[$date_str])) {
                    continue;
                }

                // If it's a working day, and not marked, mark as Absent!
                $insert_data = [
                    'user_id'         => $emp_id,
                    'attendance_date' => $date_str,
                    'status'          => 'Absent',
                    'created_at'      => $date_str . ' 23:59:59'
                ];
                $this->db->insert('attendance', $insert_data);
            }
        }

        // Update the run date
        if (!is_dir(FCPATH . 'uploads')) {
            @mkdir(FCPATH . 'uploads', 0777, true);
        }
        @file_put_contents($check_file, date('Y-m-d'));
    }

}
