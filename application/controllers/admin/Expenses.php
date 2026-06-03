<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends CI_Controller
{
    private $categories = ['office', 'software', 'hardware', 'marketing', 'travel', 'utilities', 'salary', 'other'];
    private $paymentModes = ['cash', 'upi', 'bank-transfer', 'card', 'cheque', 'other'];
    private $paymentStatuses = ['paid', 'pending'];

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        $this->load->model('Expense_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $filters = [
            'category' => $this->input->get('category', true),
            'payment_status' => $this->input->get('payment_status', true),
            'date_from' => $this->input->get('date_from', true),
            'date_to' => $this->input->get('date_to', true),
        ];

        $search = $this->input->get('search', true) ?: '';

        $data = [
            'expenses' => $this->Expense_model->get_expenses($filters, $search),
            'categories' => $this->categories,
            'payment_modes' => $this->paymentModes,
            'payment_statuses' => $this->paymentStatuses,
            'active_category' => $filters['category'],
            'active_payment_status' => $filters['payment_status'],
            'date_from' => $filters['date_from'],
            'date_to' => $filters['date_to'],
            'search' => $search,
            'total_this_month' => $this->Expense_model->total_amount([
                'month' => date('m'),
                'year' => date('Y')
            ]),
            'paid_this_month' => $this->Expense_model->total_amount([
                'month' => date('m'),
                'year' => date('Y'),
                'payment_status' => 'paid'
            ]),
            'pending_count' => $this->Expense_model->count_by_status('pending'),
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/expenses', $data);
        $this->load->view('admin/footer');
    }

    public function store()
    {
        $this->validate_expense();

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/expenses');
        }

        $expenseData = $this->expense_payload();
        $expenseData['created_by'] = $this->session->userdata('user_id') ?: null;

        $this->Expense_model->create_expense($expenseData);
        $this->session->set_flashdata('success', 'Expense added successfully.');
        redirect('admin/expenses');
    }

    public function update($id)
    {
        $expense = $this->Expense_model->get_expense($id);

        if (!$expense) {
            show_404();
        }

        $this->validate_expense();

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/expenses');
        }

        $this->Expense_model->update_expense($id, $this->expense_payload());
        $this->session->set_flashdata('success', 'Expense updated successfully.');
        redirect('admin/expenses');
    }

    public function delete($id)
    {
        $expense = $this->Expense_model->get_expense($id);

        if (!$expense) {
            show_404();
        }

        $this->Expense_model->delete_expense($id);
        $this->session->set_flashdata('success', 'Expense deleted successfully.');
        redirect('admin/expenses');
    }

    private function validate_expense()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|in_list[' . implode(',', $this->categories) . ']');
        $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('expense_date', 'Expense Date', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required|in_list[' . implode(',', $this->paymentModes) . ']');
        $this->form_validation->set_rules('payment_status', 'Payment Status', 'required|in_list[' . implode(',', $this->paymentStatuses) . ']');
        $this->form_validation->set_rules('vendor', 'Vendor', 'trim');
        $this->form_validation->set_rules('notes', 'Notes', 'trim');
    }

    private function expense_payload()
    {
        return [
            'title' => $this->input->post('title', true),
            'category' => $this->input->post('category', true),
            'amount' => (float) $this->input->post('amount', true),
            'expense_date' => $this->input->post('expense_date', true),
            'payment_mode' => $this->input->post('payment_mode', true),
            'payment_status' => $this->input->post('payment_status', true),
            'vendor' => $this->input->post('vendor', true),
            'notes' => $this->input->post('notes', true),
        ];
    }
}
