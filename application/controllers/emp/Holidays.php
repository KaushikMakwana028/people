<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }
    }


     private function headerData()
    {
        return [
            'user' => $this->db
                ->where('id', $this->session->userdata('user_id'))
                ->get('employees')
                ->row(),

            'userRole'  => $this->session->userdata('user_role'),
            'userName'  => $this->session->userdata('user_name'),
            'userPhoto' => $this->session->userdata('photo')
        ];
    }




   public function index()
{
    $data = $this -> headerData();
    
    $year = $this->input->get('year') ?? date('Y');

   
    $data['user'] = $this->db
        ->where('id', $this->session->userdata('emp_id'))
        ->get('employees')
        ->row();

    $data['year'] = $year;
   $today = date('Y-m-d');

$this->db->where('holiday_date >=', $today);
$this->db->order_by('holiday_date', 'ASC');

$data['holidays'] = $this->db->get('holidays')->result();

    $this->load->view('emp/headerr', $data);
    $this->load->view('emp/holidays', $data);
    $this->load->view('emp/footerr');
}

}
