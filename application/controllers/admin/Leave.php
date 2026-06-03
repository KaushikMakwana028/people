<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('sign_in');
        }
    }

    public function index(){
       $this->db->select('leaves.*, users.email');
$this->db->from('leaves');
$this->db->join('users','users.id = leaves.user_id');

        $data['leaves'] = $this->db->get()->result();

        $this->load->view('admin/header');
        $this->load->view('admin/leave/list', $data);
        $this->load->view('admin/footer');
    }

    public function approve($id){
        $this->db->where('id',$id)->update('leaves',['status'=>'Approved']);
        redirect('admin/leave');
    }

    public function reject($id){
        $this->db->where('id',$id)->update('leaves',['status'=>'Rejected']);
        redirect('admin/leave');
    }
}
