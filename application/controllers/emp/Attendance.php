<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

 public function __construct()
{
    parent::__construct();

    $this->load->library('session');
    $this->load->database();

   $this->load->model('emp/Dashboard_model');

   $this->load->model('emp/Attendance_model');


        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }
}

public function index()
{
    $this->load->model('emp/Attendance_model');

    $user_id = $this->session->userdata('user_id');

    $already = $this->Attendance_model->already_marked_today($user_id);

    $data = [
        'already_marked' => $already ? true : false
    ];

    $this->load->view('emp/attendance_add', $data);
}


public function save()
{
    $user_id = $this->session->userdata('user_id');

    $this->load->model('emp/Attendance_model');

    
    if ($this->Attendance_model->already_marked_today($user_id)) {
        $this->session->set_flashdata('error', 'Attendance already marked for today');
        redirect('emp/attendance_add');
    }

        $status = $this->input->post('status');
        if (empty($status) || $status !== 'Absent') {
            $status = 'Present';
        }

        $data = [
            'user_id'         => $user_id,
            'attendance_date' => date('Y-m-d'),
            'status'          => $status,
            'created_at'      => date('Y-m-d H:i:s')
        ];

        $this->Attendance_model->mark_attendance($data);

    redirect('emp/attendance_list');
}


    
    
public function attendance_list()
{
    $user_id = $this->session->userdata('user_id');

    $month = $this->input->get('month') ?? date('m');
    $year  = $this->input->get('year')  ?? date('Y');

 if ($this->input->get('month_year')) {
        [$year, $month] = explode('-', $this->input->get('month_year'));
    } else {
        $month = date('m');
        $year  = date('Y');
    }

    
  
    $summary = $this->Attendance_model
                    ->get_monthly_summary($user_id, $year, $month);

   
    $rows = $this->Attendance_model
                 ->get_monthly_attendance($user_id, $year, $month);

   
    $data = [
        'rows'       => $rows,
        'summary'    => $summary,
        'month'      => $month,
        'year'       => $year,
        'total_days' => cal_days_in_month(CAL_GREGORIAN, $month, $year),

        'userRole'   => $this->session->userdata('user_role'),
        'userName'   => $this->session->userdata('user_name'),
        'userPhoto'  => $this->session->userdata('photo'),
    ];

    $this->load->view('emp/headerr', $data);
    $this->load->view('emp/attendance_list', $data);
    $this->load->view('emp/footerr');
}


    
    // public function profile()
    // {
    //     $id = $this->session->userdata('user_id');
    //     if (!$id) redirect('sign_in');

    //     $user = $this->Dashboard_model->get_user($id);
    //     if (!$user) show_error('User not found');

    //     $data = [
    //         'user'      => $user,
    //         'userRole'  => $this->session->userdata('user_role'),
    //         'userName'  => $this->session->userdata('user_name'),
    //         'userPhoto' => $this->session->userdata('photo'),
    //     ];

    //     $this->load->view('emp/headerr', $data);
    //     $this->load->view('emp/profile', $data);
    //     $this->load->view('emp/footerr');
    // }
}
