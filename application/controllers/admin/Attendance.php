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

    $data['employees'] = $this->db->get('employees')->result();
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

    // ABSENT TODAY (AUTO)
    $absent_today = $total_emp - $present_today;

    // EMPLOYEE LIST WITH TODAY STATUS
$this->db->select('users.id, users.name as emp_name, users.photo, IF(attendance.user_id IS NULL, "Absent", "Present") as today_status');

$this->db->from('users');

$this->db->join(
'attendance',
'attendance.user_id = users.id 
AND attendance.attendance_date = "'.date('Y-m-d').'" 
AND attendance.status = "Present"',
'left'
);

$this->db->where('users.role',0);

    $data['employees'] = $this->db->get()->result();

    $data['total_emp']     = $total_emp;
    $data['present_today'] = $present_today;
    $data['absent_today']  = $absent_today;

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

   
    $this->db->where('user_id', $emp_id);
    $this->db->where('MONTH(attendance_date)', $month);
    $this->db->where('YEAR(attendance_date)', $year);
    $this->db->order_by('attendance_date', 'DESC');
    $rows = $this->db->get('attendance')->result();

  
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

    $data = [
        'rows'          => $rows,          
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

}
