<?php

class Quotation_model extends CI_Model
{
    protected $table='quotations';

    public function get_all()
    {
        return $this->db
            ->order_by('id','DESC')
            ->get($this->table)
            ->result_array();
    }

    public function get($id)
    {
        return $this->db
            ->where('id',$id)
            ->get($this->table)
            ->row_array();
    }

    public function insert()
    {
        $data=[
            'quotation_no'=>$this->input->post('quotation_no'),
            'customer_name'=>$this->input->post('customer_name'),
            'customer_email'=>$this->input->post('customer_email'),
            'customer_phone'=>$this->input->post('customer_phone'),
            'company_name'=>$this->input->post('company_name'),
            'issue_date'=>$this->input->post('issue_date'),
            'valid_until'=>$this->input->post('valid_until'),
            'subtotal'=>$this->input->post('subtotal'),
            'tax_percent'=>$this->input->post('tax_percent'),
            'tax_amount'=>$this->input->post('tax_amount'),
            'discount'=>$this->input->post('discount'),
            'total_amount'=>$this->input->post('total_amount'),
            'status'=>$this->input->post('status'),
            'notes'=>$this->input->post('notes')
        ];

        $this->db->insert($this->table,$data);

        return $this->db->insert_id();
    }

    public function update($id)
    {
        $this->db->where('id',$id);

        return $this->db->update($this->table,[
            'customer_name'=>$this->input->post('customer_name'),
            'company_name'=>$this->input->post('company_name'),
            'total_amount'=>$this->input->post('total_amount'),
            'status'=>$this->input->post('status'),
            'notes'=>$this->input->post('notes')
        ]);
    }

    public function delete($id)
    {
        return $this->db->delete(
            $this->table,
            ['id'=>$id]
        );
    }
}