<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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

        $this->load->model('Quotation_model');
    }

    public function index()
    {
        $data['quotations'] = $this->Quotation_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/quotation_view', $data);
        $this->load->view('admin/footer');
    }

    public function create()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/quotation_create');
        $this->load->view('admin/footer');
    }

    public function store()
    {
        $quotation_id = $this->Quotation_model->insert();

        redirect('admin/quotations');
    }

    public function edit($id)
    {
        $data['quotation'] = $this->Quotation_model->get($id);

        $this->load->view('admin/header');
        $this->load->view('admin/quotation_edit', $data);
        $this->load->view('admin/footer');
    }


    public function update($id)
    {
        $this->Quotation_model->update($id);

        redirect('admin/quotations');
    }

    public function delete($id)
    {
        $this->Quotation_model->delete($id);

        redirect('admin/quotations');
    }

    public function view($id)
    {
        $data['quotation'] = $this->Quotation_model->get($id);

        $this->load->view('admin/header');
        $this->load->view('admin/quotation_preview', $data);
        $this->load->view('admin/footer');
    }
}
