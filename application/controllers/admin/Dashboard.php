<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

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

        $this->load->model('Admin_model');
        
        $this->load->model('emp/Attendance_model');
        $this->Attendance_model->auto_mark_absents();
    }

private function headerData()
{
    return [
        'userRole'  => $this->session->userdata('user_role'),
        'userName'  => $this->session->userdata('user_name'),
        'userPhoto' => $this->session->userdata('user_photo'),
    ];
}



    public function index()
    {
        $userId = $this->session->userdata('user_id');

        $data['user']  = $this->Admin_model->get_user($userId);

     $user = $this->Admin_model->get_user($this->session->userdata('user_id'));

$this->session->set_userdata([
    'user_name'  => $user->name,
    'user_email' => $user->email,
    'user_photo' => $user->photo
]);   
     
 $today = date('Y-m-d'); 


$data['total_employees'] = $this->db
->where('role',0)
->count_all_results('users');

$this->db->where('MONTH(holiday_date)', date('m'));
$this->db->where('YEAR(holiday_date)', date('Y'));
$data['total_holidays_month'] = $this->db
->count_all_results('holidays');

$this->db->where('MONTH(created_at)', date('m'));
$this->db->where('YEAR(created_at)', date('Y'));
$data['total_announcements_month'] = $this->db
->count_all_results('announcements');




    $data['present_count'] = $this->db
        ->where('attendance_date', $today)
        ->where('status', 'Present')
        ->from('attendance')
        ->count_all_results();

    
    $data['leave_count'] = $this->db
        ->where('leave_date', $today)
        ->where('status', 'Approved')
        ->from('leaves')
        ->count_all_results();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function manual_logs()
    {
        $today = date('Y-m-d');
        $data = $this->headerData();

        $data['user'] = $this->Admin_model->get_user($this->session->userdata('user_id'));

        $data['employees'] = $this->db
            ->select('id, name')
            ->where('role', 0)
            ->order_by('name', 'ASC')
            ->get('users')
            ->result();

        $data['manual_logs'] = $this->db
            ->select('work_logs.*, users.name')
            ->from('work_logs')
            ->join('users', 'users.id = work_logs.user_id', 'left')
            ->where('DATE(work_logs.start_time)', $today)
            ->where('work_logs.source', 'manual')
            ->order_by('work_logs.start_time', 'DESC')
            ->get()
            ->result();

        $data['manual_break_logs'] = $this->db
            ->select('break_logs.*, users.name')
            ->from('break_logs')
            ->join('users', 'users.id = break_logs.user_id', 'left')
            ->where('DATE(break_logs.start_time)', $today)
            ->where('break_logs.source', 'manual')
            ->order_by('break_logs.start_time', 'DESC')
            ->get()
            ->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/manual_logs', $data);
        $this->load->view('admin/footer');
    }








    // profile 

                        public function profile()
                        {
                            $id = $this->session->userdata('user_id');
                            if (!$id) redirect('sign_in');
                        
                            $user = $this->Admin_model->get_user($id);
                            if (!$user) show_error('User not found');
                        
                            $data = $this->headerData();
                            $data['user'] = $user;
                        
                            $this->load->view('admin/header', $data);
                            $this->load->view('admin/profile', $data);
                            $this->load->view('admin/footer');}
                            public function update_profile()
                            {
                                $id = $this->session->userdata('user_id');
                                if (!$id) redirect('sign_in');
                            
                                $data = [
                                    'name'    => $this->input->post('name', true),
                                    'email'   => $this->input->post('email', true),
                                    'phone'   => $this->input->post('phone', true),
                                    'address' => $this->input->post('address', true),
                                ];
                            
                               
                                if (!empty($_FILES['photo']['name'])) {
                            
                                    $config = [
                                        'upload_path'   => FCPATH . 'uploads/profile/',
                                        'allowed_types' => 'jpg|jpeg|png',
                                        'max_size'      => 2048,
                                        'encrypt_name'  => true
                                    ];
                            
                                    $this->load->library('upload', $config);
                            
                                    if ($this->upload->do_upload('photo')) {
                            
                                        $upload = $this->upload->data();
                                        $data['photo'] = $upload['file_name'];
                            
                                        
                                        $old = $this->Admin_model->get_user_photo($id);
                                        if ($old && file_exists(FCPATH . 'uploads/profile/' . $old)) {
                                            unlink(FCPATH . 'uploads/profile/' . $old);
                                        }
                            
                                      
                                        $this->session->set_userdata([
                                            'photo' => $data['photo'],
                                            'user_photo' => $data['photo']
                                        ]);
                            
                                    } else {
                                        show_error($this->upload->display_errors());
                                    }
                                }
                            
                                $this->Admin_model->update_user($id, $data);
                            
                            
                                $this->session->set_userdata([
                                    'user_name'  => $data['name'],
                                    'user_email' => $data['email'],
                                    'user_photo' => isset($data['photo']) ? $data['photo'] : $this->session->userdata('user_photo')
                                ]);
                            
                                $this->session->set_flashdata('success', 'Profile updated successfully');
                                redirect('admin/profile');
                            }

// break manual 

public function add_manual_break()
{
    $emp_id = $this->input->post('emp_id');
    $start  = $this->input->post('start_time');
    $end    = $this->input->post('end_time');

   
    if (strtotime($end) <= strtotime($start)) {
        $this->session->set_flashdata('error','End time must be greater');
        redirect('admin/manual-logs');
    }

   
    $overlap = $this->db->query("
        SELECT id FROM break_logs
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
            'Break time overlaps with existing break'
        );
        redirect('admin/manual-logs');
    }

   
    $this->db->insert('break_logs', [
        'user_id'    => $emp_id,
        'start_time' => $start,
        'end_time'   => $end,
        'source'     => 'manual',
        'note'       => $this->input->post('note')
    ]);

    $this->session->set_flashdata('success', 'Manual break log added successfully');
    redirect('admin/manual-logs');
}



public function save_fcm_token()
{
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['token'])) return;

    $this->db->insert('fcm_tokens', [
        'user_id'    => $this->session->userdata('user_id'),
        'token'      => $data['token'],
        'role'       => 'admin',
        'created_at' => date('Y-m-d H:i:s')
    ]);
}

                            
                        }
         
                        


