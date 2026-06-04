<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salaries extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Salary_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // Auth guard
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

    /**
     * Dashboard View
     */
    public function index()
    {
        $selected_month = $this->input->get('month') ?? date('Y-m');

        $data['selected_month'] = $selected_month;
        $data['stats'] = $this->Salary_model->get_stats($selected_month);
        $data['developers'] = $this->Salary_model->get_developers_overview($selected_month);
        $data['history'] = $this->Salary_model->get_payments_history();

        // List of all active developers for the add payment modal dropdown
        $data['active_devs'] = $this->db
            ->where('role', 0)
            ->where('is_active', 1)
            ->order_by('name', 'ASC')
            ->get('users')
            ->result_array();

        $this->load->view('admin/header');
        $this->load->view('admin/salary_view', $data);
        $this->load->view('admin/footer');
    }

    /**
     * Save a salary payment
     */
    public function store()
    {
        $this->form_validation->set_rules('user_id', 'Developer', 'required|integer');
        $this->form_validation->set_rules('amount', 'Amount Paid', 'required|numeric');
        $this->form_validation->set_rules('month_year', 'Month', 'required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/salaries');
        }

        $payment_data = [
            'user_id' => (int)$this->input->post('user_id'),
            'amount' => floatval($this->input->post('amount')),
            'month_year' => trim($this->input->post('month_year')),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' => trim($this->input->post('payment_mode')),
            'notes' => trim($this->input->post('notes')) ?: null
        ];

        $this->Salary_model->add_payment($payment_data);
        $this->session->set_flashdata('success', 'Salary payment added successfully!');
        redirect('admin/salaries');
    }

    /**
     * AJAX fetch developer attendance and base salary details
     */
    public function get_developer_stats()
    {
        $user_id = (int)$this->input->post('user_id');
        $month_year = trim($this->input->post('month_year'));

        if (!$user_id || !$month_year) {
            echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
            return;
        }

        $stats = $this->Salary_model->get_developer_stats($user_id, $month_year);
        if ($stats) {
            echo json_encode(['success' => true, 'data' => $stats]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Developer not found']);
        }
    }

    /**
     * AJAX fetch developer full details (profile, bank info, attendance logs, and payment history)
     */
    public function get_salary_details_ajax()
    {
        $user_id = (int)$this->input->post('user_id');
        $month_year = trim($this->input->post('month_year'));

        if (!$user_id || !$month_year) {
            echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
            return;
        }

        // Get user details
        $user = $this->db->where('id', $user_id)->get('users')->row_array();
        if (!$user) {
            echo json_encode(['success' => false, 'message' => 'Developer not found']);
            return;
        }
        // Remove password hash for security
        unset($user['password']);

        // Get attendance details for the selected month
        $attendance_records = $this->db
            ->where('user_id', $user_id)
            ->like('attendance_date', $month_year, 'after')
            ->order_by('attendance_date', 'ASC')
            ->get('attendance')
            ->result_array();

        $present_count = 0;
        $absent_count = 0;
        foreach ($attendance_records as &$att) {
            if (strtolower($att['status']) === 'present') {
                $present_count++;
            } else if (strtolower($att['status']) === 'absent') {
                $absent_count++;
            }
            // Format date for display
            $dateObj = strtotime($att['attendance_date']);
            $att['formatted_date'] = date('d M Y', $dateObj);
            $att['day_name'] = date('l', $dateObj);
            $att['day_num'] = date('d', $dateObj);
            $att['month_abr'] = date('M', $dateObj);
        }

        // Calculate salary breakdown
        $salary_calc = $this->Salary_model->calculate_salary($user_id, $month_year);

        // Get payment details for the selected month
        $month_payment = $this->db
            ->where('user_id', $user_id)
            ->where('month_year', $month_year)
            ->get('salary_payments')
            ->row_array();

        if ($month_payment) {
            $month_payment['formatted_payment_date'] = date('M j, Y', strtotime($month_payment['payment_date']));
        }

        // Get all payments history for this user
        $payments_history = $this->db
            ->where('user_id', $user_id)
            ->order_by('payment_date', 'DESC')
            ->get('salary_payments')
            ->result_array();

        // Total paid all time
        $total_paid = 0;
        foreach ($payments_history as &$ph) {
            $total_paid += $ph['amount'];
            $ph['formatted_payment_date'] = date('M j, Y', strtotime($ph['payment_date']));
            $ph['formatted_month'] = date('F, Y', strtotime($ph['month_year'] . '-01'));
        }

        echo json_encode([
            'success' => true,
            'data' => [
                'user' => $user,
                'salary_calc' => $salary_calc,
                'attendance' => [
                    'present' => $present_count,
                    'absent' => $absent_count,
                    'records' => $attendance_records
                ],
                'selected_month_payment' => $month_payment,
                'total_paid' => $total_paid,
                'payments_history' => $payments_history
            ]
        ]);
    }

    /**
     * Delete a payment record
     */
    public function delete($id)
    {
        $this->Salary_model->delete_payment((int)$id);
        $this->session->set_flashdata('success', 'Payment record deleted.');
        redirect('admin/salaries');
    }

    /**
     * Update developer's base monthly salary
     */
    public function update_base_salary()
    {
        $this->form_validation->set_rules('user_id', 'Developer ID', 'required|integer');
        $this->form_validation->set_rules('monthly_salary', 'Monthly Salary', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/salaries');
        }

        $user_id = (int)$this->input->post('user_id');
        $monthly_salary = floatval($this->input->post('monthly_salary'));
        $redirect_month = $this->input->post('redirect_month') ?: date('Y-m');

        $this->Salary_model->update_base_salary($user_id, $monthly_salary);

        $this->session->set_flashdata('success', 'Base salary updated successfully!');
        redirect('admin/salaries?month=' . $redirect_month);
    }
}
