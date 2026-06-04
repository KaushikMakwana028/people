<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }
    }

    public function index()
    {
        $data['employees'] = $this->db
            ->select('id, email')
            ->from('users')
            ->where('role', 0)
            ->where('is_active', 1)
            ->get()
            ->result();

        $this->load->view('admin/header');
        $this->load->view('admin/history', $data);  
        $this->load->view('admin/footer');
    }

    public function view($emp_id)
    {
        $selected_date = $this->input->get('date');
        if (empty($selected_date)) {
            $selected_date = date('Y-m-d');
        }
        $today = $selected_date;

        $this->db->where('ref_id', $emp_id)
             ->where('type', 'daily_report')
             ->where('ref_date', $today)
             ->update('notifications', ['is_read' => 1]);

    

    // 👤 employee
$data['emp'] = $this->db
        ->where('id', $emp_id)
        ->get('users')
        ->row();

    // ⏸ break logs
    $data['break_logs'] = $this->db
        ->where('user_id', $emp_id)
        ->where('DATE(start_time)', $today)
        ->get('break_logs')
        ->result();

    // ⏱ work logs
    $data['hour_logs'] = $this->db
        ->where('user_id', $emp_id)
        ->where('DATE(start_time)', $today)
        ->get('work_logs')
        ->result();

    // ⏱ total break time
    $data['total_break_seconds'] = $this->db
        ->select('SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)) as total')
        ->where('user_id', $emp_id)
        ->where('DATE(start_time)', $today)
        ->get('break_logs')
        ->row()->total ?? 0;

    // ⏱ total work time
    $data['total_work_seconds'] = $this->db
        ->select('SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)) as total')
        ->where('user_id', $emp_id)
        ->where('DATE(start_time)', $today)
        ->get('work_logs')
        ->row()->total ?? 0;

    // 📝 daily report
    $data['report'] = $this->db
        ->where('employee_id', $emp_id)
        ->where('report_date', $today)
        ->get('daily_reports')
        ->row();

    $data['selected_date'] = $today;

    // 📄 views
    $this->load->view('admin/header', $data);
    $this->load->view('admin/view', $data);
    $this->load->view('admin/footer', $data);
}


    public function add()
{
    if ($this->input->post()) {
        $this->db->insert('holidays', [
            'holiday_date' => $this->input->post('holiday_date'),
            'holiday_name' => $this->input->post('holiday_name'),
            'year'         => date('Y', strtotime($this->input->post('holiday_date')))
        ]);

        redirect('admin/holidays');
    }

    $this->load->view('admin/header');
    $this->load->view('admin/holiday_add');
    $this->load->view('admin/footer');
}


// today edit 28 
public function add_manual_work()
{
    if ($this->input->post()) {

        $emp_id = $this->input->post('emp_id');
        $start  = $this->input->post('start_time');
        $end    = $this->input->post('end_time');

        if (!$emp_id) {
            $this->session->set_flashdata('error', 'Employee not selected');
            redirect('admin/manual-logs');
        }

        if (strtotime($end) <= strtotime($start)) {
            $this->session->set_flashdata(
                'error',
                'End time must be greater than start time'
            );
            redirect('admin/manual-logs');
        }

        
        $overlap = $this->db->query("
            SELECT id FROM work_logs
            WHERE user_id = ?
              AND start_time < ?
              AND end_time   > ?
        ", [
            $emp_id,
            $end,
            $start
        ])->row();

        if ($overlap) {
            $this->session->set_flashdata(
                'error',
                'Work time overlaps with existing work log'
            );
            redirect('admin/manual-logs');
        }

       
        $this->db->insert('work_logs', [
            'user_id'    => $emp_id,
            'start_time' => $start,
            'end_time'   => $end,
            'source'     => 'manual',
            'note'       => $this->input->post('note')
        ]);

        $this->session->set_flashdata(
            'success',
            'Manual work log added successfully'
        );

        redirect('admin/manual-logs');
    }
}


}



