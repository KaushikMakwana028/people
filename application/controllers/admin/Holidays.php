<?php
class Holidays extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }
    }

    public function index()
    {
        $year = $this->input->get('year') ?? date('Y');
        $data['year'] = $year;

        $data['holidays'] = $this->db
            ->where('YEAR(holiday_date)', $year)
            ->order_by('holiday_date', 'ASC')
            ->get('holidays')
            ->result();

        $this->load->view('admin/header');
        $this->load->view('admin/holidays', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $date = $this->input->post('holiday_date');
        $name = $this->input->post('holiday_name');

        $day = date('l', strtotime($date));

        $this->db->insert('holidays', [
            'holiday_date' => $date,
            'day'          => $day,
            'holiday_name' => $name
        ]);

        redirect('admin/holidays?year=' . date('Y', strtotime($date)));
    }

    // ✏️ EDIT HOLIDAY
public function update($id)
{
    $date = $this->input->post('holiday_date');
    $name = $this->input->post('holiday_name');

    $day = date('l', strtotime($date));

    $this->db->where('id', $id);
    $this->db->update('holidays', [
        'holiday_date' => $date,
        'day'          => $day,
        'holiday_name' => $name
    ]);

    redirect('admin/holidays?year=' . date('Y', strtotime($date)));
}

    // 🗑️ DELETE HOLIDAY
   public function delete($id)
{
    $this->db->where('id', $id);
    $this->db->delete('holidays');

    redirect('admin/holidays');
}
}