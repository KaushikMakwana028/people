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

        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
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
            ->where_in('role', [0, 2])
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
            $this->form_validation->set_rules('role', 'Role', 'required|in_list[0,2]');

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
                    'role' => (int)$this->input->post('role'),
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

    $data['performance'] = $this->Employee_model->get_employee_performance($id);

    $this->load->view('admin/header',$data);
    $this->load->view('admin/employee_view',$data);
    $this->load->view('admin/footer');
}


    public function edit($id)
    {
        $data['emp'] = $this->db->where('id', $id)->get('users')->row();
        if (!$data['emp'])
            show_404();

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
            'address' => $this->input->post('address'),
            'designation' => $this->input->post('designation'),
            'dob' => !empty($this->input->post('dob')) ? $this->input->post('dob') : null,
            'aadhar_card' => $this->input->post('aadhar_card'),
            'skills' => $this->input->post('skills'),
            'bank_name' => $this->input->post('bank_name'),
            'account_holder_name' => $this->input->post('account_holder_name'),
            'account_number' => $this->input->post('account_number'),
            'ifsc_code' => $this->input->post('ifsc_code'),
            'bank_branch' => $this->input->post('bank_branch'),
        ];

        // 🔹 ROLE UPDATE LOGIC
        $role = $this->input->post('role');
        if ($role !== null && in_array((int)$role, [0, 2], true)) {
            $data['role'] = (int)$role;
        }

        // 📸 PHOTO UPDATE LOGIC
        if (!empty($_FILES['photo']['name'])) {
            $old_user = $this->db->where('id', $id)->get('users')->row();
            $old_photo = $old_user ? $old_user->photo : null;

            $config['upload_path']   = FCPATH . 'uploads/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $upload = $this->upload->data();
                $data['photo'] = $upload['file_name'];
                if ($old_photo && file_exists(FCPATH . 'uploads/profile/' . $old_photo)) {
                    unlink(FCPATH . 'uploads/profile/' . $old_photo);
                }

                // If updated user is logged in
                if ($this->session->userdata('user_id') == $id) {
                    $this->session->set_userdata('user_photo', $data['photo']);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('admin/employee/edit/' . $id);
                return;
            }
        }

        // Sync session username if currently logged in user is being updated
        if ($this->session->userdata('user_id') == $id) {
            $this->session->set_userdata('user_name', $data['name']);
        }

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
