<?php
class Attendance extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }
    }

   public function add_attendance()
{
    if ($this->input->post('submit')) {

        $data = [
            'user_id' => $this->input->post('employee_id'),
            'attendance_date' => $this->input->post('attendance_date'),
            'status' => $this->input->post('status')
        ];

        $this->db->insert('attendance', $data);
        redirect('attendance_list');
    }

    $data['employees'] = $this->db->where('role', 0)->get('users')->result();
    $this->load->view('attendance/add_attendance', $data);
}

public function attendance_list()
{
    $today = date('Y-m-d');

    // TOTAL EMPLOYEES
    $total_emp = $this->db
    ->where('role',0)
    ->count_all_results('users');

    // PRESENT TODAY
    $present_today = $this->db
    ->select('COUNT(DISTINCT user_id) as total')
    ->where('attendance_date',$today)
    ->where('status','Present')
    ->get('attendance')
    ->row()->total;

    // ABSENT TODAY
    $absent_today = $this->db
    ->select('COUNT(DISTINCT user_id) as total')
    ->where('attendance_date',$today)
    ->where('status','Absent')
    ->get('attendance')
    ->row()->total;

    // LATE TODAY
    $late_today = $this->db
    ->select('COUNT(DISTINCT user_id) as total')
    ->where('attendance_date',$today)
    ->where('status','Late')
    ->get('attendance')
    ->row()->total;

    // EMPLOYEE LIST WITH TODAY STATUS
    $this->db->select('users.id, users.name as emp_name, users.photo, IFNULL(attendance.status, "Not Marked") as today_status, DATE_FORMAT(attendance.created_at, "%h:%i %p") as check_in_time');

    $this->db->from('users');

    $this->db->join(
    'attendance',
    'attendance.user_id = users.id 
    AND attendance.attendance_date = "'.$today.'"',
    'left'
    );

    $this->db->where('users.role', 0);

    $data['employees'] = $this->db->get()->result();

    $data['total_emp']     = $total_emp;
    $data['present_today'] = $present_today;
    $data['absent_today']  = $absent_today;
    $data['late_today']    = $late_today;

    $this->load->view('admin/header');
    $this->load->view('attendance/attendance_list', $data);
    $this->load->view('admin/footer');
}
public function view_details($emp_id)
{
    if ($this->input->get('month_year')) {
        [$year, $month] = explode('-', $this->input->get('month_year'));
    } else {
        $month = date('m');
        $year  = date('Y');
    }

    $emp = $this->db
        ->where('id', $emp_id)
        ->get('users')
        ->row();

    // Actual attendance records for this month
    $this->db->where('user_id', $emp_id);
    $this->db->where('MONTH(attendance_date)', $month);
    $this->db->where('YEAR(attendance_date)', $year);
    $this->db->order_by('attendance_date', 'DESC');
    $db_rows = $this->db->get('attendance')->result();

    $this->db->where([
        'user_id' => $emp_id,
        'status'  => 'Present'
    ]);
    $this->db->where('MONTH(attendance_date)', $month);
    $this->db->where('YEAR(attendance_date)', $year);
    $present_count = $this->db->count_all_results('attendance');

    $this->db->where([
        'user_id' => $emp_id,
        'status'  => 'Absent'
    ]);
    $this->db->where('MONTH(attendance_date)', $month);
    $this->db->where('YEAR(attendance_date)', $year);
    $absent_count = $this->db->count_all_results('attendance');

    // Fetch holidays
    $holidays_raw = $this->db->get('holidays')->result();
    $holidays = [];
    foreach ($holidays_raw as $h) {
        $holidays[$h->holiday_date] = $h->holiday_name;
    }

    // Fetch approved leaves
    $leaves_raw = $this->db
        ->where('user_id', $emp_id)
        ->where('status', 'Approved')
        ->get('leaves')
        ->result();
    $leaves = [];
    foreach ($leaves_raw as $l) {
        $leaves[$l->leave_date] = $l->leave_type;
    }

    // Map db rows by date
    $attendance_by_date = [];
    foreach ($db_rows as $r) {
        $attendance_by_date[$r->attendance_date] = $r;
    }

    // Generate days for the selected month
    $num_days = (int)date('t', strtotime("$year-$month-01"));
    
    // If it's current month, show up to today. Otherwise, show all days of the month.
    $end_day = ($year == date('Y') && $month == date('m')) ? (int)date('d') : $num_days;

    $merged_rows = [];
    for ($d = $end_day; $d >= 1; $d--) {
        $date_str = sprintf('%04d-%02d-%02d', $year, $month, $d);
        $day_of_week = date('N', strtotime($date_str)); // 1 (Mon) - 7 (Sun)
        
        $row_data = new stdClass();
        $row_data->attendance_date = $date_str;
        
        if (isset($attendance_by_date[$date_str])) {
            $att = $attendance_by_date[$date_str];
            $row_data->status = $att->status;
            $row_data->created_at = $att->created_at;
        } else {
            $row_data->created_at = null;
            if ($day_of_week == 6 || $day_of_week == 7) {
                $row_data->status = 'Weekend';
            } elseif (isset($holidays[$date_str])) {
                $row_data->status = 'Holiday';
                $row_data->holiday_name = $holidays[$date_str];
            } elseif (isset($leaves[$date_str])) {
                $ltype = $leaves[$date_str];
                if ($ltype === 'full_day') {
                    $row_data->status = 'Leave (Full)';
                } elseif ($ltype === 'first_half') {
                    $row_data->status = 'Leave (1st Half)';
                } elseif ($ltype === 'second_half') {
                    $row_data->status = 'Leave (2nd Half)';
                } else {
                    $row_data->status = 'Leave';
                }
            } else {
                if ($date_str === date('Y-m-d')) {
                    $row_data->status = 'Not Marked';
                } else {
                    $row_data->status = 'Absent';
                }
            }
        }
        $merged_rows[] = $row_data;
    }

    $data = [
        'rows'          => $merged_rows,          
        'present_count' => $present_count,
        'absent_count'  => $absent_count,
        'emp'           => $emp,
        'month'         => $month,
        'year'          => $year
    ];

    $this->load->view('admin/header');
    $this->load->view('attendance/view_details', $data);
    $this->load->view('admin/footer');
}

public function update_attendance()
{
    if ($this->input->post()) {
        $emp_id = $this->input->post('employee_id');
        $date = $this->input->post('attendance_date');
        $status = $this->input->post('status');

        if (empty($emp_id) || empty($date)) {
            $this->session->set_flashdata('error', 'Invalid parameters');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        // Check if there is an existing record
        $existing = $this->db
            ->where('user_id', $emp_id)
            ->where('attendance_date', $date)
            ->get('attendance')
            ->row();

        if ($status === 'Not Marked') {
            // Delete record if it exists
            if ($existing) {
                $this->db
                    ->where('id', $existing->id)
                    ->delete('attendance');
            }
            $this->session->set_flashdata('success', 'Attendance record removed');
        } else {
            $data = [
                'user_id'         => $emp_id,
                'attendance_date' => $date,
                'status'          => $status,
            ];

            if ($existing) {
                // Update
                if ($status === 'Absent') {
                    $data['created_at'] = $date . ' 23:59:59';
                } elseif ($status === 'Present' || $status === 'Late') {
                    // If it was previously Absent, set time to current time, else keep original
                    if ($existing->status === 'Absent' || strpos($existing->created_at, '23:59:59') !== false) {
                        $data['created_at'] = $date . ' ' . date('H:i:s');
                    }
                }
                $this->db
                    ->where('id', $existing->id)
                    ->update('attendance', $data);
            } else {
                // Insert
                if ($status === 'Absent') {
                    $data['created_at'] = $date . ' 23:59:59';
                } else {
                    $data['created_at'] = $date . ' ' . date('H:i:s');
                }
                $this->db->insert('attendance', $data);
            }
            $this->session->set_flashdata('success', 'Attendance updated successfully');
        }
    }
    redirect($_SERVER['HTTP_REFERER']);
}

}
