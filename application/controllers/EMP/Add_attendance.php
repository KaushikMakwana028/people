<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_attendance extends CI_Controller {

    public function __construct()
    {
       
        parent::__construct();
        $this->load->database();
    
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('emp/Attendance_model');

        if (
            !$this->session->userdata('logged_in') ||
            $this->session->userdata('user_role') != 0
            ) {
            redirect('sign_in');
        }
           
    }

    public function index()
    {
        
        $user_id = $this->session->userdata('user_id');

        
        $already = $this->Attendance_model->already_marked_today($user_id);

        $data = [
            'already_marked' => $already ? true : false
        ];

   $data['userName'] = $this->session->userdata('user_name');

$this->load->view('emp/headerr', $data);
$this->load->view('emp/attendance_add', $data);
$this->load->view('emp/footerr');
    }

    public function save()
    {
        $user_id = $this->session->userdata('user_id');



        $today = date('Y-m-d');

$leave = $this->db
    ->where('user_id', $user_id)
    ->where('leave_date', $today)
    ->where('status', 'Approved')
    ->where('leave_type', 'full_day')
    ->get('leaves')
    ->row();

if ($leave) {
    $this->session->set_flashdata('error','You cannot mark attendance on full day leave');
    redirect('emp/dashboard');
}




       
        $already = $this->Attendance_model->already_marked_today($user_id);
        if ($already) {
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
}

