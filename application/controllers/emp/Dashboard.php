<?php
date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('fcm');
        $this->load->helper('date');   // ✅ ADD THIS LINE
        $this->load->library('session');
        $this->load->database();
        $this->load->model('emp/Dashboard_model');
        // $this->load->model('Dashboard_model');
        $this->load->model('Task_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        if ($this->session->userdata('user_role') == 1) {
            redirect('admin/dashboard');
        }
    }

    protected function headerData()
    {
        $user_id = $this->session->userdata('user_id');

        $user = $this->db
            ->where('id', $user_id)
            ->get('users')
            ->row();

        return [
            'userPhoto' => $user->photo ?? null,
            'userRole'  => $user->role ?? null,
            'userName'  => $user->name ?? 'User',
        ];
    }

    public function index()
    {

        date_default_timezone_set('Asia/Kolkata');
        $today = date('Y-m-d');

        $data = $this->headerData();   // FIRST HEADER DATA

        $this->load->model('emp/Dashboard_model');  // MODEL LOAD

        $data['today_breaks'] = $this->Dashboard_model->today_breaks(); // THEN BREAKS
        $user_id = $this->session->userdata('user_id');
        // echo "hh";
        // die;

        // 🎂 Upcoming Birthdays (Next 7 days)
        $data['upcoming_birthdays'] = $this->Dashboard_model->get_upcoming_birthdays();




        // All user tasks
        $data['tasks'] = $this->Task_model->get_user_tasks($user_id);

        // Task overview cards
        $data['task_counts'] = $this->Dashboard_model->get_task_counts($user_id);

        // Today's tasks
        $data['today_tasks'] = $this->Dashboard_model->get_today_tasks($user_id);

        // Recent completed tasks
        $data['recent_tasks'] = $this->Task_model->get_recent_completed_tasks(7);
        // 👨‍💻 All Employees with Skills
        $data['emp_skills'] = $this->db
            ->where('role', 0)
            ->get('users')
            ->result();


        $user_id = $this->session->userdata('user_id');

        /* ---- CHECK TODAY APPROVED LEAVE ---- */
        $leave = $this->db
            ->where('user_id', $user_id)
            ->where('leave_date', $today)
            ->where('status', 'Approved')
            ->get('leaves')
            ->row();

        $data['leave_type_today'] = $leave ? $leave->leave_type : null;

        /* ---- REPORT TIME LOGIC ---- */
        $report_hour = 19; // default 7 PM

        if ($leave) {

            if ($leave->leave_type == 'second_half') {
                // employee works only first half
                $report_hour = 14; // 2 PM approx (2:30 ke liye JS me handle karenge)
            }

            if ($leave->leave_type == 'full_day') {
                $report_hour = null; // report allowed nahi
            }
        }

        $data['report_hour'] = $report_hour;






        // ❌ DATA RESET LINE REMOVED

        $data['hour_logs'] = $this->Dashboard_model->get_hourly_logs($user_id);
        $data['breaks'] = $this->Dashboard_model->get_today_breaks($user_id);
        $data['break_summary'] = $this->Dashboard_model->get_today_break_summary($user_id);

        $bs = (int) $data['break_summary']->total_seconds;
        $data['formattedBreakTime'] = sprintf(
            '%02dh %02dm %02ds',
            floor($bs / 3600),
            floor(($bs % 3600) / 60),
            $bs % 60
        );

        $ws = $this->Dashboard_model->get_today_work_total($user_id);
        $data['formattedWorkTime'] = sprintf(
            '%02dh %02dm %02ds',
            floor($ws / 3600),
            floor(($ws % 3600) / 60),
            $ws % 60
        );

        $today = date('Y-m-d');

        $data['report_submitted'] = $this->db
            ->where('employee_id', $user_id)
            ->where('report_date', $today)
            ->get('daily_reports')
            ->row() ? true : false;


        // 🔥🔥🔥 TODAY APPROVED LEAVES FOR ALL EMPLOYEES
        $this->db->select('users.name, leaves.leave_type, leaves.reason, leaves.created_at');
        $this->db->from('leaves');
        $this->db->join('users', 'users.id = leaves.user_id');
        $this->db->where('DATE(leaves.leave_date)', date('Y-m-d'));
        $this->db->where('leaves.status', 'Approved');

        $data['today_leaves'] = $this->db->get()->result();


        // 🔥 UPCOMING HOLIDAYS (NEXT 4)
        $today = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('holidays');
        $this->db->where('holiday_date >=', $today);
        $this->db->order_by('holiday_date', 'ASC');
        $this->db->limit(4);

        $data['upcoming_holidays'] = $this->db->get()->result();


        // 🔥 ANNOUNCEMENTS
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $data['announcements'] = $this->db->get('announcements')->result();


        // ✅ LOAD VIEW ONLY ONCE
        $this->load->view('emp/headerr', $data);
        $this->load->view('emp/dashboard', $data);
        $this->load->view('emp/footerr');
    }


    // profile jova mate 
    public function view_profile($id)
    {
        $data = $this->headerData();

        $data['user'] = $this->db
            ->where('id', $id)
            ->get('users')
            ->row();

        $logged_in_id = $this->session->userdata('user_id');

        $data['is_own_profile'] = ($logged_in_id == $id);

        if (!$data['user']) {
            show_404();
        }

        $this->load->view('emp/headerr', $data);
        $this->load->view('emp/profile', $data);
        $this->load->view('emp/footerr');
    }
















    public function start_work()
    {
        $this->session->unset_userdata('on_break');

        $this->Dashboard_model->start_work($this->session->userdata('user_id'));
        echo json_encode(['status' => 'started']);
    }

    public function stop_work()
    {
        $this->Dashboard_model->stop_work($this->session->userdata('user_id'));
        echo json_encode(['status' => 'stopped']);
    }


    public function start_timer()
    {

        if ($this->session->userdata('break_id')) {
            echo json_encode(['status' => 'already']);
            return;
        }

        $this->db->insert('break_logs', [
            'user_id' => $this->session->userdata('user_id'),
            'user_name' => $this->session->userdata('user_name'),
            'reason' => $this->input->post('reason'),
            'start_time' => date('Y-m-d H:i:s'),
            'end_time' => NULL
        ]);

        $this->session->set_userdata([
            'break_id' => $this->db->insert_id(),
            'on_break' => true
        ]);

        echo json_encode(['status' => 'started']);
    }


    public function stop_timer()
    {
        $break_id = $this->session->userdata('break_id');

        if (!$break_id) {
            echo json_encode(['status' => 'no_break']);
            return;
        }

        $this->db->where('id', $break_id)
            ->update('break_logs', [
                'end_time' => date('Y-m-d H:i:s')
            ]);

        $this->session->unset_userdata(['break_id', 'on_break']);

        echo json_encode(['status' => 'ended']);
    }



    public function auto_close()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id)
            return;


        $this->Dashboard_model->stop_work($user_id);


        if ($this->session->userdata('break_start')) {

            $this->Dashboard_model->add_break([
                'user_id' => $user_id,
                'user_name' => $this->session->userdata('user_name'),
                'reason' => 'Auto Closed (Page Closed)',
                'start_time' => $this->session->userdata('break_start'),
                'end_time' => date('Y-m-d H:i:s')
            ]);

            $this->session->unset_userdata('break_start');
        }
    }

    public function daily_reset()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id)
            return;


        $this->Dashboard_model->stop_work($user_id);


        if ($this->session->userdata('break_start')) {
            $this->Dashboard_model->add_break([
                'user_id' => $user_id,
                'user_name' => $this->session->userdata('user_name'),
                'reason' => 'Auto Reset (New Day)',
                'start_time' => $this->session->userdata('break_start'),
                'end_time' => date('Y-m-d H:i:s')
            ]);

            $this->session->unset_userdata('break_start');
        }

        echo json_encode(['status' => 'reset']);
    }



    public function resume_work()
    {
        $user_id = $this->session->userdata('user_id');


        $this->db->where('id', function ($db) use ($user_id) {
            $db->select('id')
                ->from('break_logs')
                ->where('user_id', $user_id)
                ->where('end_time IS NULL', null, false)
                ->order_by('id', 'DESC')
                ->limit(1);
        })->update('break_logs', [
            'end_time' => date('Y-m-d H:i:s')
        ]);


        // $this->Dashboard_model->start_work($user_id);

        $this->session->unset_userdata('on_break');
    }


















    public function complete_day()
    {
        date_default_timezone_set('Asia/Kolkata');


        $emp_id = $this->session->userdata('user_id');
        $today = date('Y-m-d');
        $currentHour = date('H'); // 00-23 format

        /* ---- CHECK LEAVE ---- */

        $leave = $this->db
            ->where('user_id', $emp_id)
            ->where('leave_date', $today)
            ->where('status', 'Approved')
            ->get('leaves')
            ->row();

        $reportHour = 19; // default 7 PM

        if ($leave) {

            // 2nd Half Leave → employee worked only first half
            if ($leave->leave_type == 'half_day_2') {
                // Employee worked only first half (10 AM – 2 PM)
                $reportHour = 14; // 2 PM
            }

            // Full Day Leave → report submit not allowed
            if ($leave->leave_type == 'full_day') {
                echo json_encode([
                    'status' => 'leave',
                    'message' => 'You are on full day leave'
                ]);
                return;
            }
        }

        // 🚫 BLOCK BEFORE ALLOWED TIME
        if ($currentHour < $reportHour) {
            echo json_encode([
                'status' => 'time_error',
                'message' => 'You can submit report later'
            ]);
            return;
        }

        // already submitted check
        $exists = $this->db
            ->where('employee_id', $emp_id)
            ->where('report_date', $today)
            ->get('daily_reports')
            ->row();

        if ($exists) {
            echo json_encode(['status' => 'already']);
            return;
        }

        $this->db->insert('daily_reports', [
            'employee_id' => $emp_id,
            'report_date' => $today,
            'report' => $this->input->post('daily_report'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->db->where('user_id', $emp_id)
            ->where('end_time IS NULL', null, false)
            ->update('work_logs', [
                'end_time' => date('Y-m-d H:i:s')
            ]);

        echo json_encode(['status' => 'success']);
    }



    public function save_fcm_token()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['token'])) {
            echo json_encode(['status' => 'no_token']);
            return;
        }

        // duplicate token avoid
        $exists = $this->db
            ->where('token', $data['token'])
            ->get('fcm_tokens')
            ->row();

        if ($exists) {
            echo json_encode(['status' => 'already_saved']);
            return;
        }

        $this->db->insert('fcm_tokens', [
            'user_id' => $this->session->userdata('user_id'),
            'token' => $data['token'],
            'role' => $this->session->userdata('user_role'), // emp / admin
            'created_at' => date('Y-m-d H:i:s')
        ]);

        echo json_encode(['status' => 'saved']);
    }
}
