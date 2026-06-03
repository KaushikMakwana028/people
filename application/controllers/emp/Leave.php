<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');

        if (!$this->session->userdata('user_id')) {
            redirect('sign_in');
        }
    }

    
    private function headerData()
    {
        return [
            'user' => $this->db
    ->where('id', $this->session->userdata('user_id'))
    ->get('users')
    ->row(),

            'userRole'  => $this->session->userdata('user_role'),
            'userName'  => $this->session->userdata('user_name'),
            'userPhoto' => $this->session->userdata('photo')
        ];
    }

    
    public function index()
    {
        $data = $this->headerData();

        $data['leaves'] = $this->db
            ->where('user_id', $this->session->userdata('user_id'))
            ->get('leaves')
            ->result();

        $this->load->view('emp/headerr', $data);
        $this->load->view('emp/leave/list', $data);
        $this->load->view('emp/footerr');
    }

    public function add()
    {
        $data = $this->headerData();

        
       $user_id = $this->session->userdata('user_id');

$data['employee'] = $this->db
        ->where('id', $user_id)
        ->get('users')
        ->row();

        $this->load->view('emp/headerr', $data);
        $this->load->view('emp/leave/add', $data);
        $this->load->view('emp/footerr');



    }

   
public function store()
{
    $user_id = $this->session->userdata('user_id');

    $this->db->insert('leaves', [

        'user_id'    => $user_id,
        'leave_date' => $this->input->post('leave_date'),
        'leave_type' => $this->input->post('leave_type'),
        'reason'     => $this->input->post('reason'),
        'status'     => 'Pending'
    ]);

    redirect('emp/leave');
}


}
