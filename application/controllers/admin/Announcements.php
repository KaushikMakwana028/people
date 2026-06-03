<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

      if (!$this->session->userdata('logged_in')) {
    redirect('sign_in');
}

// if ($this->session->userdata('user_role') !== 'admin') {
//     show_error('Access Denied', 403);
// }

    }

    public function index(){
        $data['announcements'] = $this->db
            ->order_by('id','DESC')
            ->get('announcements')
            ->result();

        $this->load->view('admin/header');
        $this->load->view('admin/announcements/list',$data);
        $this->load->view('admin/footer');
    }

    public function add(){
        $this->load->view('admin/header');
        $this->load->view('admin/announcements/add');
        $this->load->view('admin/footer');
    }

    public function store(){

        $this->db->insert('announcements',[
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'created_by' => $this->session->userdata('user_id')
        ]);

        redirect('admin/announcements');
    }

    public function delete($id)
{
    $this->db->where('id', $id);
    $this->db->delete('announcements');

    redirect('admin/announcements');
}
}
