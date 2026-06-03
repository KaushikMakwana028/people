<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Employee_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');

        }
    }


    private function headerData()
{
    return [
        'userRole'  => $this->session->userdata('user_role'),
        'userName'  => $this->session->userdata('user_name'),
        'userPhoto' => $this->session->userdata('user_photo'),
    ];
}

    // 🔹 LIST EMPLOYEE
    public function index()
    {


        $data['employees'] = $this->db
            ->where('role', 0)
            ->get('users')
            ->result();
        $this->load->view('admin/header');
        $this->load->view('admin/employee_list', $data);
        $this->load->view('admin/footer');
    }

    // 🔹 ADD EMPLOYEE
    public function add()
    {
        $data = [];

        if ($this->input->method() === 'post') {

            $this->form_validation->set_rules('yourname', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('address', 'Address', 'required');

            if ($this->form_validation->run() == TRUE) {

                $insert = [
                    'name' => trim($this->input->post('yourname')),
                    'phone' => trim($this->input->post('phone')),
                    'email' => strtolower(trim($this->input->post('email'))),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'address' => $this->input->post('address'),
                    'bank_name' => trim($this->input->post('bank_name')),
                    'account_holder_name' => trim($this->input->post('account_holder_name')),
                    'account_number' => trim($this->input->post('account_number')),
                    'ifsc_code' => strtoupper(trim($this->input->post('ifsc_code'))),
                    'bank_branch' => trim($this->input->post('bank_branch')),
                    'role' => 0,
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('users', $insert);

                $this->session->set_flashdata('success', 'Employee added successfully');
                redirect('admin/employee');
            }
        }

        // ❗VALIDATION FAIL HONE PE SAME VIEW LOAD HOGA
        $this->load->view('admin/header');
        $this->load->view('admin/add_employee', $data);
        $this->load->view('admin/footer');
    }



public function view_profile($id)
{
    $data = $this->headerData();

    $data['user'] = $this->db
        ->where('id',$id)
        ->get('users')
        ->row();

    $logged_in_id = $this->session->userdata('user_id');

    $data['is_own_profile'] = ($logged_in_id == $id);

    if(!$data['user']){
        show_404();
    }

    $this->load->view('admin/header',$data);
    $this->load->view('emp/profile',$data);
    $this->load->view('admin/footer');
}


    public function edit($id)
    {
        $data['emp'] = $this->db->where('id', $id)->get('users')->row();
        if (!$data['emp'])
            show_404();

        // ⭐ ADD THIS LINE
        $data['performance'] = $this->Employee_model->get_employee_performance($id);

        $this->load->view('admin/header');
        $this->load->view('admin/employee_edit', $data);
        $this->load->view('admin/footer');
    }
    public function update($id)
    {
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm_password');

        $data = [
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
        ];

        // 🔐 PASSWORD UPDATE LOGIC
        if (!empty($password)) {

            if ($password != $confirm) {
                $this->session->set_flashdata('error', 'Password not matched');
                redirect('admin/employee/edit/' . $id);
                return;
            }

            // HASH PASSWORD
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        // UPDATE IN DB
        $this->db->where('id', $id)->update('users', $data);

        $this->session->set_flashdata('success', 'Employee updated successfully');
        redirect('admin/employee');
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('users');

        $this->session->set_flashdata('success', 'Employee deleted');
        redirect('admin/employee');
    }




}
