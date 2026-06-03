<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all products
     */
    public function get_all_products()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('products')->result();
    }

    /**
     * Get single product by id
     */
    public function get_product($id)
    {
        return $this->db->where('id', $id)->get('products')->row();
    }

    /**
     * Insert new product
     */
    public function insert_product($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    /**
     * Update product
     */
    public function update_product($id, $data)
    {
        return $this->db->where('id', $id)->update('products', $data);
    }

    /**
     * Delete product and its associated image
     */
    public function delete_product($id)
    {
        $product = $this->get_product($id);
        if ($product) {
            if ($product->image && file_exists(FCPATH . 'uploads/products/' . $product->image)) {
                unlink(FCPATH . 'uploads/products/' . $product->image);
            }
            return $this->db->where('id', $id)->delete('products');
        }
        return false;
    }
}
