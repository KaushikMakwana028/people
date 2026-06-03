<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Access guards
        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        // Restrict to Sales role (user_role = 2)
        if ($this->session->userdata('user_role') != 2) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $this->load->model('Admin_model');
        $this->load->model('emp/Attendance_model');
        $this->Attendance_model->auto_mark_absents();
    }

    private function headerData()
    {
        return [
            'userRole'  => $this->session->userdata('user_role'),
            'userName'  => $this->session->userdata('user_name'),
            'userPhoto' => $this->session->userdata('user_photo'),
        ];
    }

    /**
     * Dashboard view for sales role
     */
    public function index()
    {
        $userId = $this->session->userdata('user_id');
        $data['user'] = $this->Admin_model->get_user($userId);

        // Sync session data
        $this->session->set_userdata([
            'user_name'  => $data['user']->name,
            'user_email' => $data['user']->email,
            'user_photo' => $data['user']->photo
        ]);

        // Load models
        $this->load->model('Product_model');
        $this->load->model('Product_lead_model');

        // Fetch overall KPI counts
        $kpis = $this->Product_lead_model->get_kpi_counts();
        $total_leads = array_sum($kpis);

        // Fetch product list and their performance breakdown
        $products = $this->Product_model->get_all_products();
        $product_performance = [];
        foreach ($products as $p) {
            $product_performance[] = [
                'id' => $p->id,
                'name' => $p->name,
                'kpis' => $this->Product_lead_model->get_kpi_counts($p->id),
                'total' => $this->db->where('product_id', $p->id)->count_all_results('product_leads')
            ];
        }

        // Fetch priority leads (New & Follow Up)
        $this->db->select('pl.*, p.name as product_name');
        $this->db->from('product_leads pl');
        $this->db->join('products p', 'p.id = pl.product_id', 'left');
        $this->db->where_in('pl.status', ['New', 'Follow Up']);
        $this->db->order_by('pl.id', 'DESC');
        $this->db->limit(10);
        $priority_leads = $this->db->get()->result();

        $data['kpis'] = $kpis;
        $data['total_leads'] = $total_leads;
        $data['product_performance'] = $product_performance;
        $data['priority_leads'] = $priority_leads;

        $this->load->view('sales/header', $data);
        $this->load->view('sales/dashboard', $data);
        $this->load->view('sales/footer');
    }

    /**
     * Profile view for sales role
     */
    public function profile()
    {
        $id = $this->session->userdata('user_id');
        $user = $this->Admin_model->get_user($id);
        if (!$user) {
            show_error('User not found');
        }

        $data = $this->headerData();
        $data['user'] = $user;

        $this->load->view('sales/header', $data);
        $this->load->view('sales/profile', $data);
        $this->load->view('sales/footer');
    }

    /**
     * Update profile details for sales role
     */
    public function update_profile()
    {
        $id = $this->session->userdata('user_id');

        $data = [
            'name'    => $this->input->post('name', true),
            'email'   => $this->input->post('email', true),
            'phone'   => $this->input->post('phone', true),
            'address' => $this->input->post('address', true),
        ];

        // Avatar photo upload logic
        if (!empty($_FILES['photo']['name'])) {
            $config = [
                'upload_path'   => FCPATH . 'uploads/profile/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size'      => 2048,
                'encrypt_name'  => true
            ];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $upload = $this->upload->data();
                $data['photo'] = $upload['file_name'];

                $old = $this->Admin_model->get_user_photo($id);
                if ($old && file_exists(FCPATH . 'uploads/profile/' . $old)) {
                    unlink(FCPATH . 'uploads/profile/' . $old);
                }

                $this->session->set_userdata([
                    'photo' => $data['photo'],
                    'user_photo' => $data['photo']
                ]);
            } else {
                show_error($this->upload->display_errors());
            }
        }

        $this->Admin_model->update_user($id, $data);

        $this->session->set_userdata([
            'user_name'  => $data['name'],
            'user_email' => $data['email'],
            'user_photo' => isset($data['photo']) ? $data['photo'] : $this->session->userdata('user_photo')
        ]);

        $this->session->set_flashdata('success', 'Profile updated successfully');
        redirect('sales/profile');
    }

    /**
     * Save FCM push notification token
     */
    public function save_fcm_token()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['token'])) return;

        $this->db->insert('fcm_tokens', [
            'user_id'    => $this->session->userdata('user_id'),
            'token'      => $data['token'],
            'role'       => 'sales',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
