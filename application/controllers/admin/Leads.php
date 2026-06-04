<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lead_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

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

    public function index()
    {
        $filters = [];
        $search = $this->input->get('search') ?? '';

        if ($this->input->get('status')) {
            $filters['status'] = $this->input->get('status');
        }

        if ($this->input->get('source')) {
            $filters['source'] = $this->input->get('source');
        }

        $data['leads']           = $this->Lead_model->get_leads($filters, $search);
        $data['total_leads']     = $this->Lead_model->count_all();
        $data['in_progress_leads']    = $this->Lead_model->count_by_status('in-progress');
        $data['not_interested_leads'] = $this->Lead_model->count_by_status('not-interested');
        $data['converted_leads'] = $this->Lead_model->count_by_status('converted');

        $data['active_status'] = $this->input->get('status') ?? '';
        $data['active_source'] = $this->input->get('source') ?? '';
        $data['search']        = $search;

        $data['users'] = $this->db->get('users')->result_array();

        $this->load->view('admin/header');
        $this->load->view('admin/lead_view', $data);
        $this->load->view('admin/footer');
    }
    // public function add()
    // {
    //     // Load list of users for the Assignee dropdown
    //     $this->load->model('User_model'); // adjust to your existing user model name
    //     $data['users'] = $this->db->get('users')->result_array();
    //     $this->load->view('leads/add', $data);
    // }

    public function store()
    {
        $validStatuses = ['in-progress', 'converted', 'not-interested'];

        $this->form_validation->set_rules('name',    'Name',    'required|trim');
        $this->form_validation->set_rules('email',   'Email',   'trim|valid_email');
        $this->form_validation->set_rules('phone',   'Phone',   'trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
        $this->form_validation->set_rules('source',  'Source',  'trim');
        $this->form_validation->set_rules('status',  'Status',  'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/leads');
        }

        if (!in_array($this->input->post('status'), $validStatuses, true)) {
            $this->session->set_flashdata('error', 'Invalid lead status selected.');
            redirect('admin/leads');
        }

        $leadData = [
            'name'        => $this->input->post('name'),
            'email'       => $this->input->post('email'),
            'phone'       => $this->input->post('phone'),
            'company'     => $this->input->post('company'),
            'source'      => $this->input->post('source'),
            'status'      => $this->input->post('status'),
            'notes'       => $this->input->post('notes'),
        ];

        $this->Lead_model->create_lead($leadData);
        $this->session->set_flashdata('success', 'Lead added successfully!');
        redirect('admin/leads');
    }

    // ──────────────────────────────────────────────
    //  VIEW  –  Lead detail (used in modal or separate page)
    // ──────────────────────────────────────────────
    public function view($id)
    {
        $lead = $this->Lead_model->get_lead($id);

        if (!$lead) {
            show_404();
        }

        header('Content-Type: application/json');
        echo json_encode($lead);
    }

    public function create()
    {
        redirect('admin/leads');
    }

    // ──────────────────────────────────────────────
    //  EDIT  –  Show edit form pre-filled
    // ──────────────────────────────────────────────
    public function edit($id)
    {
        $data['lead'] = $this->Lead_model->get_lead($id);
        $data['users'] = $this->db->get('users')->result_array();

        if (!$data['lead']) {
            show_404();
        }

        $this->load->view('admin/header');
        $this->load->view('admin/lead_edit', $data);
        $this->load->view('admin/footer');
    }

    // ──────────────────────────────────────────────
    //  UPDATE  –  Handle POST from Edit form
    // ──────────────────────────────────────────────
    public function update($id)
    {
        $validStatuses = ['in-progress', 'converted', 'not-interested'];

        $this->form_validation->set_rules('name',   'Name',   'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/leads/edit/' . $id);
        }

        if (!in_array($this->input->post('status'), $validStatuses, true)) {
            $this->session->set_flashdata('error', 'Invalid lead status selected.');
            redirect('admin/leads/edit/' . $id);
        }

        $leadData = [
            'name'        => $this->input->post('name'),
            'email'       => $this->input->post('email'),
            'phone'       => $this->input->post('phone'),
            'company'     => $this->input->post('company'),
            'source'      => $this->input->post('source'),
            'status'      => $this->input->post('status'),
            'notes'       => $this->input->post('notes'),
        ];

        $this->Lead_model->update_lead($id, $leadData);
        $this->session->set_flashdata('success', 'Lead updated successfully!');
        redirect('admin/leads');
    }

    // ──────────────────────────────────────────────
    //  UPDATE STATUS  –  AJAX quick-status change
    //  Called via POST { id, status }
    // ──────────────────────────────────────────────
    public function update_status()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $id     = (int)$this->input->post('id');
        $status = $this->input->post('status');
        $validStatuses = ['in-progress', 'converted', 'not-interested'];

        if (!$id || !in_array($status, $validStatuses)) {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
            return;
        }

        $this->Lead_model->update_lead($id, ['status' => $status]);
        echo json_encode(['success' => true]);
    }

    // ──────────────────────────────────────────────
    //  DELETE
    // ──────────────────────────────────────────────
    public function delete($id)
    {
        $this->Lead_model->delete_lead($id);
        $this->session->set_flashdata('success', 'Lead deleted.');
        redirect('admin/leads');
    }
}
