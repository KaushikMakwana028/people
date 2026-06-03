<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_lead_model');
        $this->load->model('Product_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // Check if sales user is logged in (role = 2)
        if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') != 2) {
            redirect('sign_in');
        }
    }

    /**
     * View Leads for Sales Representatives
     */
    public function index()
    {
        $product_id = $this->input->get('product_id');
        $status = $this->input->get('status');
        $search = $this->input->get('search') ?? '';
        $date = $this->input->get('date');
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        $sort_by = $this->input->get('sort_by') ?? 'pl.id';
        $sort_dir = $this->input->get('sort_dir') ?? 'DESC';
        $page = (int)($this->input->get('page') ?? 1);
        if ($page < 1) $page = 1;
        $limit = (int)($this->input->get('limit') ?? 10);
        if ($limit < 1) $limit = 10;
        $offset = ($page - 1) * $limit;

        $filters = [];
        if ($status) {
            $filters['status'] = $status;
        }

        if ($date) {
            $filters['date'] = $date;
        }
        if ($month) {
            $filters['month'] = $month;
        }
        if ($year) {
            $filters['year'] = $year;
        }

        $leads = $this->Product_lead_model->get_leads($product_id, $filters, $search, $limit, $offset, $sort_by, $sort_dir);
        $total_records = $this->Product_lead_model->count_leads($product_id, $filters, $search);
        $kpis = $this->Product_lead_model->get_kpi_counts($product_id, $filters, $search);

        if ($this->input->is_ajax_request() || $this->input->get('ajax') == 1) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'leads' => $leads,
                'kpis' => $kpis,
                'total_records' => $total_records,
                'page' => $page,
                'limit' => $limit,
                'total_pages' => ceil($total_records / $limit)
            ]);
            return;
        }

        $data['products'] = $this->Product_model->get_all_products();
        $data['selected_product_id'] = $product_id;
        $data['selected_product'] = $product_id ? $this->Product_model->get_product($product_id) : null;
        $data['leads'] = $leads;
        $data['kpis'] = $kpis;
        $data['total_records'] = $total_records;
        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['total_pages'] = ceil($total_records / $limit);
        $data['status_filter'] = $status ?? '';
        $data['search'] = $search;
        $data['filter_date'] = $date ?? '';
        $data['filter_month'] = $month ?? '';
        $data['filter_year'] = $year ?? '';
        $data['sort_by'] = $sort_by;
        $data['sort_dir'] = $sort_dir;

        $this->load->view('sales/header');
        $this->load->view('sales/leads', $data);
        $this->load->view('sales/footer');
    }

    /**
     * AJAX endpoint to update lead status and notes
     */
    public function update_status()
    {
        // Require POST
        if ($this->input->method() !== 'post') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
            return;
        }

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $notes = $this->input->post('notes');

        $validStatuses = ['New', 'Contacted', 'Follow Up', 'Converted', 'Not Interested'];

        if (!$id || !in_array($status, $validStatuses, true)) {
            echo json_encode(['success' => false, 'message' => 'Invalid lead ID or status.']);
            return;
        }

        $result = $this->Product_lead_model->update_status($id, $status, $notes);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Lead status updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update lead status.']);
        }
    }
}

