<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        $this->load->model('Project_model');
    }

    public function index()
    {
        $data['payment_logs'] = $this->Project_model->get_payment_logs();
        $data['projects'] = $this->Project_model->get_all_projects();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/payments', $data);
        $this->load->view('admin/footer');
    }

    public function transactions()
    {
        $data['transactions'] = $this->Project_model->get_transactions();
        $data['projects'] = $this->Project_model->get_all_projects();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/transactions', $data);
        $this->load->view('admin/footer');
    }

    public function store()
    {
        $project_id = (int) $this->input->post('project_id');

        if (!$project_id || !$this->Project_model->get_project($project_id)) {
            show_404();
        }

        $this->Project_model->insert_payment_log([
            'project_id' => $project_id,
            'amount' => (float) $this->input->post('amount', true),
            'payment_date' => $this->input->post('payment_date', true),
            'payment_mode' => $this->input->post('payment_mode', true),
            'notes' => $this->input->post('notes', true),
            'created_by' => $this->session->userdata('user_id') ?: null,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Payment log added successfully.');
        redirect('admin/payments');
    }

    public function store_transaction()
    {
        $project_id = (int) $this->input->post('project_id');
        $project = $project_id ? $this->Project_model->get_project($project_id) : null;

        $this->Project_model->insert_transaction([
            'project_id' => $project ? $project_id : null,
            'client_name' => $this->input->post('client_name', true) ?: ($project->client_name ?? null),
            'transaction_type' => $this->input->post('transaction_type', true),
            'amount' => (float) $this->input->post('amount', true),
            'transaction_date' => $this->input->post('transaction_date', true),
            'status' => $this->input->post('status', true),
            'payment_mode' => $this->input->post('payment_mode', true),
            'notes' => $this->input->post('notes', true),
            'created_by' => $this->session->userdata('user_id') ?: null,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Transaction added successfully.');
        redirect('admin/transactions');
    }

    public function delete_transaction($id)
    {
        $this->Project_model->delete_transaction($id);
        $this->session->set_flashdata('success', 'Transaction deleted successfully.');
        redirect('admin/transactions');
    }
}
