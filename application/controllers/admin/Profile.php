<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        // 🔴 EMPLOYEE BLOCK
        if ($this->session->userdata('user_role') == 0) {
            redirect('emp/dashboard');
        }

        $this->load->model('Admin_model');
        $this->load->database();
    }

    public function index()
    {
        $id = $this->session->userdata('user_id');

        $user = $this->Admin_model->get_user($id);
        if (!$user) show_error('User not found');

        $data = [
            'user'      => $user,
            'userName'  => $this->session->userdata('user_name'),
            'userPhoto' => $this->session->userdata('user_photo'),
            'userRole'  => $this->session->userdata('user_role'),
        ];

        // ✅ ADMIN HEADER + ADMIN PROFILE VIEW
        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer');
    }

public function update_profile()
{
    $id = $this->session->userdata('user_id');

    $data = [
        'name'        => $this->input->post('name', true),
        'email'       => $this->input->post('email', true),
        'phone'       => $this->input->post('phone', true),
        'address'     => $this->input->post('address', true),
        'designation' => $this->input->post('designation', true),
        'skills'      => $this->input->post('skills', true),
        'aadhar_card' => $this->input->post('aadhar_card', true),
        'dob'         => $this->input->post('dob', true),
    ];

    // 🔥 PHOTO UPLOAD
    if (!empty($_FILES['photo']['name'])) {

        $config['upload_path']   = FCPATH . 'uploads/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('photo')) {

            $upload = $this->upload->data();
            $data['photo'] = $upload['file_name'];

        } else {

            echo $this->upload->display_errors();
            exit;

        }
    }

    // 🔥 STEP 1: UPDATE USER IN DB
    $this->Admin_model->update_user($id, $data);

    // 🔥 STEP 2: GET UPDATED USER AGAIN FROM DB
    $updatedUser = $this->Admin_model->get_user($id);

    // 🔥 STEP 3: REFRESH SESSION FROM DB (MOST IMPORTANT)
    $this->session->set_userdata([
        'user_name'  => $updatedUser->name,
        'user_email' => $updatedUser->email,
        'user_photo' => $updatedUser->photo
    ]);

    $this->session->set_flashdata('success','Profile updated');
    redirect('admin/profile');
}

}