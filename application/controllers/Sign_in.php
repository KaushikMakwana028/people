<?php
class Sign_in extends CI_Controller {

 public function index()
{
    if ($this->session->userdata('logged_in')) {

        if ($this->session->userdata('user_role') === 'admin') {
            redirect('admin/dashboard');
        }

        if ($this->session->userdata('user_role') === 'emp') {
            redirect('emp/dashboardd');
        }
    }

    $this->load->view('admin/sign_in');
}


   public function login()
{
    $email    = $this->input->post('email');
    $password = $this->input->post('password');

    /* ================= ADMIN LOGIN FIRST ================= */
    $admin = $this->db
        ->where('email', $email)
        ->where('role', 'admin')
        ->get('users')
        ->row();

    if ($admin && password_verify($password, $admin->password)) {

        $this->session->set_userdata([
            'user_id'    => $admin->id,
            'user_name'  => $admin->name,
            'user_role'  => 'admin',
            'user_photo' => $admin->photo ?? null,
            'logged_in'  => true
        ]);
// echo '<pre>';
// print_r($this->session->userdata());
// die;
        redirect('admin/dashboard');
        return;
    }

    /* ================= EMPLOYEE LOGIN ================= */
    $emp = $this->db
        ->where('email', $email)
        ->get('employees')
        ->row();

//         echo '<pre>';
// var_dump($emp);
// die;

    if ($emp && password_verify($password, $emp->password)) {

        $this->session->set_userdata([
            'user_id'    => $emp->id,
            'user_name'  => $emp->name,
            'user_role'  => 'emp',
            'user_photo' => $emp->photo ?? null,
            'logged_in'  => true
        ]);

        redirect('emp/dashboardd');
        return;
    }

    /* ================= INVALID LOGIN ================= */
    $this->session->set_flashdata('login_error', 'Invalid email or password');
    redirect('sign_in');
}



public function logout()
{
    // 🔒 session data clear
    $this->session->unset_userdata([
        'user_id',
        'user_name',
        'user_role',
        'user_photo',
        'logged_in'
    ]);

    // extra safety
    $this->session->sess_destroy();

    // login page pe redirect
    redirect('sign_in');
}

}


