<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // Check if admin is logged in (role = 1)
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
     * Show products list & manage page
     */
    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/products');
        $config['total_rows'] = $this->db->count_all('products');
        $config['per_page'] = 8;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        // Styling for Bootstrap 5
        $config['full_tag_open'] = '<nav class="mt-4"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $config['per_page'];

        $data['products'] = $this->db->order_by('created_at', 'DESC')
                                     ->limit($config['per_page'], $offset)
                                     ->get('products')
                                     ->result();

        $data['current_page'] = $page;
        $data['per_page'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination_links'] = $this->pagination->create_links();

        $this->load->view('admin/header');
        $this->load->view('admin/products_list', $data);
        $this->load->view('admin/footer');
    }

    /**
     * Add new product
     */
    public function add()
    {
        $this->form_validation->set_rules('name', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/products');
        }

        $image_name = null;

        // Image upload handling
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = FCPATH . 'uploads/products/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/products');
            }
        }

        $productData = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'image' => $image_name,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Product_model->insert_product($productData);
        $this->session->set_flashdata('success', 'Product added successfully!');
        redirect('admin/products');
    }

    /**
     * Edit / Update product
     */
    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/products');
        }

        $product = $this->Product_model->get_product($id);
        if (!$product) {
            show_404();
        }

        $image_name = $product->image;

        // Check if new image is uploaded
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = FCPATH . 'uploads/products/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                // Delete old image if exists
                if ($image_name && file_exists($config['upload_path'] . $image_name)) {
                    unlink($config['upload_path'] . $image_name);
                }
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/products');
            }
        }

        $updateData = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'image' => $image_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Product_model->update_product($id, $updateData);
        $this->session->set_flashdata('success', 'Product updated successfully!');
        redirect('admin/products');
    }

    /**
     * Delete product
     */
    public function delete($id)
    {
        if ($this->Product_model->delete_product($id)) {
            $this->session->set_flashdata('success', 'Product deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete product.');
        }
        redirect('admin/products');
    }
}
