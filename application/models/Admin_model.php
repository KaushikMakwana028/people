<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
public function get_today_emp_time_summary()
{
    return $this->db->query("
        SELECT 
            e.name AS employee_name,
            COALESCE(w.work_seconds,0) AS work_seconds,
            COALESCE(b.break_seconds,0) AS break_seconds,
            (COALESCE(w.work_seconds,0) + COALESCE(b.break_seconds,0)) AS total_seconds
        FROM employees e
        LEFT JOIN (
            SELECT user_id,
                   SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)) AS work_seconds
            FROM work_logs
            WHERE end_time IS NOT NULL
              AND DATE(start_time)=CURDATE()
            GROUP BY user_id
        ) w ON w.user_id = e.id
        LEFT JOIN (
            SELECT user_id,
                   SUM(TIMESTAMPDIFF(SECOND,start_time,end_time)) AS break_seconds
            FROM break_logs
            WHERE end_time IS NOT NULL
              AND DATE(start_time)=CURDATE()
            GROUP BY user_id
        ) b ON b.user_id = e.id
        ORDER BY e.name
    ")->result();
}
 
   public function get_user($id){
    return $this->db->where('id',$id)
                    ->get('users')
                    ->row();
}

   


    public function get_user_photo($id)
{
    return $this->db->select('photo')
                    ->where('id',$id)
                    ->get('users')
                    ->row('photo');
}

public function update_user($id,$data){
    return $this->db->where('id',$id)
                    ->update('users',$data);
}

}