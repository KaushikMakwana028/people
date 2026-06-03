<?php
class Sign_in extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
    }
    public function index()
    {
        // clear old error
        $this->session->unset_userdata('login_error');

        if ($this->session->userdata('logged_in')) {

            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }

            return;
        }

        $this->load->view('admin/sign_in');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db
            ->where('email', $email)
            ->get('users')
            ->row();

        if ($user && password_verify($password, $user->password)) {

            // ✅ regenerate session safely
            $this->session->sess_regenerate(TRUE);

            $role = (int) $user->role;

            $this->session->set_userdata([
                'user_id'    => $user->id,
                'admin_id'   => $user->id,
                'user_name'  => $user->name,
                'user_role'  => $role,
                'user_photo' => $user->photo ?? null,
                'logged_in'  => true
            ]);

            // ✅ Auto-mark absent days upon login
            $this->load->model('emp/Attendance_model');
            $this->Attendance_model->auto_mark_absents();

            if ($role == 1) {
                redirect('admin/dashboard');
            } else if ($role == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
            return;
        }

        $this->session->set_flashdata('login_error', 'Invalid credentials');
        redirect('sign_in');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        delete_cookie('ci_session');
        redirect('sign_in');
    }
}
