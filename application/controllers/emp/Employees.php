<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller
{
    // $this->load->model('Employee_model');

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Employee_model');


    }

    public function save_attendance()
    {

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'date' => date('Y-m-d'),
            'status' => $this->input->post('status')
        ];

        $this->Attendance_model->insert($data);

        redirect('emp/attendance_list');
    }

    // (optional) list page
    public function attendance_list()
    {
        $data['attendance'] = $this->Attendance_model->get_by_emp(
            $this->session->userdata('user_id')
        );
        $this->load->view('emp/attendance_list', $data);
        $type = $this->input->post('leave_type');

        $session = null;
        if ($type == 'half_day_1') {
            $session = '10:00-14:00';
        } elseif ($type == 'half_day_2') {
            $session = '15:00-19:00';
        }

        $data = [
            'user_id' => $this->session->userdata('user_id'),
            'leave_date' => $this->input->post('leave_date'),
            'leave_type' => $type,
            'leave_session' => $session,
            'reason' => $this->input->post('reason'),
            'status' => 'Pending'
        ];

        $this->db->insert('leaves', $data);
    }

  
}
