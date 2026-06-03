<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata('logged_in')){
            redirect('sign_in');
        }
    }

    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/change_password');
        $this->load->view('admin/footer');
    }

    public function save(){

        $user_id = $this->session->userdata('user_id');

        $old = $this->input->post('old_password');
        $new = $this->input->post('new_password');
        $confirm = $this->input->post('confirm_password');

        $user = $this->db->where('id',$user_id)->get('users')->row();

        // OLD PASSWORD CHECK
        if(!password_verify($old,$user->password)){
            $this->session->set_flashdata('error','Old Password Incorrect');
            redirect('admin/change_password');
        }

        // MATCH CHECK
        if($new != $confirm){
            $this->session->set_flashdata('error','Passwords do not match');
            redirect('admin/change_password');
        }

        // UPDATE PASSWORD
        $hashed = password_hash($new,PASSWORD_DEFAULT);

        $this->db->where('id',$user_id);
        $this->db->update('users',['password'=>$hashed]);

        $this->session->set_flashdata('success','Password Changed Successfully');

        redirect('admin/change_password');
    }
}