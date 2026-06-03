<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        $this->load->model('emp/Dashboard_model');
        $this->load->database();
    }

public function index($id = null)
{
    // agar id na mile toh apni profile open karo
    if(!$id){
        $id = $this->session->userdata('user_id');
    }

    $user = $this->Dashboard_model->get_user($id);
    if (!$user) show_error('User not found');

    $logged_in_id = $this->session->userdata('user_id');

    $data = [
        'user'            => $user,
        'is_own_profile'  => ($logged_in_id == $id), // 🔥 MAIN FLAG
        'userName'        => $this->session->userdata('user_name'),
        'userPhoto'       => $this->session->userdata('user_photo'),
        'userRole'        => $this->session->userdata('user_role'),
    ];

    $this->load->view('emp/headerr', $data);
    $this->load->view('emp/profile', $data);
    $this->load->view('emp/footerr');
}


    public function update_profile()
    {
        $id = $this->session->userdata('user_id');

        $data = [
            'name'         => $this->input->post('name', true),
            'email'        => $this->input->post('email', true),
            'phone'        => $this->input->post('phone', true),
            'address'      => $this->input->post('address', true),
            'designation'  => $this->input->post('designation', true),
            'skills'       => $this->input->post('skills', true),
            'aadhar_card'  => $this->input->post('aadhar_card', true),
            'dob'          => $this->input->post('dob', true),
            'bank_name'    => $this->input->post('bank_name', true),
            'account_holder_name' => $this->input->post('account_holder_name', true),
            'account_number' => $this->input->post('account_number', true),
            'ifsc_code'    => $this->input->post('ifsc_code', true),
            'bank_branch'  => $this->input->post('bank_branch', true),
        ];
        
        if (!empty($_FILES['photo']['name'])) {
            $old_user = $this->Dashboard_model->get_user($id);
            $old_photo = $old_user ? $old_user->photo : null;

            $config['upload_path']   = FCPATH . 'uploads/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photo')) {
                echo $this->upload->display_errors();
                exit;
            } else {
                $upload = $this->upload->data();
                $data['photo'] = $upload['file_name'];
                if ($old_photo && file_exists(FCPATH . 'uploads/profile/' . $old_photo)) {
                    unlink(FCPATH . 'uploads/profile/' . $old_photo);
                }

                $this->session->set_userdata('user_photo', $data['photo']);
            }
        }

        $this->Dashboard_model->update_user($id, $data);

        $this->session->set_userdata([
            'user_name'  => $data['name'],
            'user_email' => $data['email'],
            'user_photo' => isset($data['photo']) ? $data['photo'] : $this->session->userdata('user_photo')
        ]);

        $this->session->set_flashdata('success','Profile updated');
        redirect('emp/profile');
    }

  public function change_password()
{
    $data = [
        'userName'  => $this->session->userdata('user_name'),
        'userPhoto' => $this->session->userdata('user_photo'),
        'userRole'  => $this->session->userdata('user_role'),
    ];

    $this->load->view('emp/headerr', $data);
    $this->load->view('emp/change_password');
    $this->load->view('emp/footerr');
}
    

    public function save_password()
    {
        $id = $this->session->userdata('user_id');

        $old = $this->input->post('old_password');
        $new = $this->input->post('new_password');
        $con = $this->input->post('confirm_password');

        if ($new !== $con) {
            $this->session->set_flashdata('error','Password not matched');
            redirect('emp/change-password');
            return;
        }

        $emp = $this->db->where('id',$id)->get('users')->row();

        if (!password_verify($old, $emp->password)) {
            $this->session->set_flashdata('error','Old password wrong');
            redirect('emp/change-password');
            return;
        }

      $this->db->where('id',$id)->update('users',[
    'password' => password_hash($new, PASSWORD_BCRYPT)
]);

        $this->session->set_flashdata('success','Password updated successfully');
        redirect('emp/change-password');
    }
}
