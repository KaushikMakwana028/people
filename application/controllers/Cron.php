<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('emp/Attendance_model');
    }

    public function mark_absents()
    {
        $force = ($this->input->get('force') === '1');
        $this->Attendance_model->auto_mark_absents($force);
        echo "Auto-absent check executed successfully. Date: " . date('Y-m-d H:i:s');
    }
}
