<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Task_model');
        $this->load->model('User_model');
        $this->load->model('Project_model');
        $this->load->library('session');
        $this->load->helper('url');

        if ($this->session->userdata('logged_in') !== true) {
            redirect('sign_in');
        }
    }

    protected function headerData()
    {
        return [
            'userPhoto' => $this->session->userdata('user_photo'),
            'userRole' => $this->session->userdata('user_role'),
            'userName' => $this->session->userdata('user_name'),
        ];
    }
    /* =====================================================
   USER – MY TASK LIST
===================================================== */
    public function my_tasks()
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $user_id = $this->session->userdata('user_id');

        $data['tasks'] = $this->Task_model->get_user_tasks($user_id);

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/my_tasks', $data);
        $this->load->view('Userside/footer');
    }


    /* =====================================================
   USER – TASK LOGS
===================================================== */
    public function my_task_logs($task_id)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        if (!$task_id) {
            show_404();
        }

        $data['task'] = $this->Task_model->get_task_by_id($task_id);
        $data['logs'] = $this->Task_model->get_task_logs_full($task_id);

        if (!$data['task']) {
            show_404();
        }

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/my_task_logs', $data);
        $this->load->view('Userside/footer');
    }



    /* =====================================================
       ADMIN SECTION
    ===================================================== */

    public function list()
    {
        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $assigned_to = $this->input->get('assigned_to');
        $data['users'] = $this->User_model->get_all_users();

        if (!empty($assigned_to)) {
            $data['tasks'] = $this->Task_model->get_tasks($assigned_to);
        } else {
            $data['tasks'] = $this->Task_model->get_all_tasks();
        }

        $this->load->view('admin/header');
        $this->load->view('task_list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $data['users'] = $this->User_model->get_all_users();
        $data['projects'] = $this->Project_model->get_all_projects();

        $this->load->view('admin/header');
        $this->load->view('task_add', $data);
        $this->load->view('admin/footer');
    }

    public function store()
    {
        $start_time = $this->input->post('start_time');

        $hours = (int) $this->input->post('duration_hours');
        $minutes = (int) $this->input->post('duration_minutes');
        $expected_minutes = ($hours * 60) + $minutes;

        $end_time = date(
            'Y-m-d H:i:s',
            strtotime($start_time . " +{$expected_minutes} minutes")
        );

        $data = [
            'project_id' => $this->input->post('project_id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'assigned_to' => $this->input->post('assigned_to'),
            'priority' => $this->input->post('priority'),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'expected_minutes' => $expected_minutes,
            'due_date' => $this->input->post('due_date'),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Task_model->insert_task($data);

        redirect('task/list');
    }

    /* =====================================================
       ⚠️ KEEPING THIS FUNCTION (NOT USED)
    ===================================================== */
    public function complete_task($task_id, $user_id)
    {
        return false;
    }

    public function edit($id)
    {
        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $data['task'] = $this->Task_model->get_task_by_id($id);
        $data['users'] = $this->User_model->get_all_users();
        $data['projects'] = $this->Project_model->get_all_projects();

        if (!$data['task']) {
            show_404();
        }

        $this->load->view('admin/header');
        $this->load->view('task_edit', $data);
        $this->load->view('admin/footer');
    }

    public function update($id)
    {
        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $dueDate = $this->input->post('due_date');
        $dueTime = $this->input->post('due_time');

        if ($dueDate && empty($dueTime)) {
            $dueTime = '23:59:00';
        }

        $data = [
            'project_id' => $this->input->post('project_id'),
            'title' => $this->input->post('title'),

            // 🔥 FIXED
            'assigned_to' => $this->input->post('user_id'),

            'priority' => $this->input->post('priority'),
            'status' => $this->input->post('status'),
            'start_time' => $this->input->post('start_time'),
            'due_date' => $dueDate,
            'due_time' => $dueTime
        ];

        $this->Task_model->update_task($id, $data);

        $this->session->set_flashdata('success', 'Task updated successfully!');
        redirect('project/tasks_by_project');
    }



    public function delete($id)
    {
        if ($this->session->userdata('user_role') != 1) {
            if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('emp/dashboard');
            }
        }

        $task = $this->Task_model->get_task_by_id($id);
        if (!$task) {
            show_404();
        }

        $project_id = $task->project_id;

        $this->Task_model->delete_task($id);

        $this->session->set_flashdata('success', 'Task deleted');

        redirect('project/tasks_by_project/' . $project_id);
    }
    // KEEPING (legacy)

    public function delete_task($id)
    {
        return $this->db->where('id', $id)->delete('tasks');
    }

    /* =====================================================
   USER SECTION
===================================================== */
    public function start($task_id)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $user_id = $this->session->userdata('user_id');

        // 1️⃣ Check if user already has a running task
        $runningTask = $this->Task_model->get_running_task_by_user($user_id);

        // ❌ Another task is already running → BLOCK
        if ($runningTask && (int) $runningTask->id !== (int) $task_id) {
            $this->session->set_flashdata(
                'error',
                'You already have a running task. Stop it first.'
            );
            redirect('task/task_details/' . $runningTask->id);
            return;
        }

        // 👁 Same task already running → just open it
        if ($runningTask && (int) $runningTask->id === (int) $task_id) {
            redirect('task/task_details/' . $task_id);
            return;
        }

        // ✅ Start task via MODEL
        $this->Task_model->start_task($task_id, $user_id);

        redirect('task/task_details/' . $task_id);
    }



    public function stop($task_id)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $user_id = $this->session->userdata('user_id');

        // 🔥 get latest RUNNING log for this user & task
        $log = $this->db
            ->where('task_id', $task_id)
            ->where('user_id', $user_id)
            ->where('status', 'running')
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get('task_work_logs')
            ->row();

        if ($log) {
            $end = date('Y-m-d H:i:s');
            $seconds = strtotime($end) - strtotime($log->start_time);

            $this->db->where('id', $log->id)->update('task_work_logs', [
                'end_time' => $end,
                'duration_seconds' => $seconds,
                'status' => 'stopped'
            ]);
        }

        // 🔄 back to pending
        $this->db->where('id', $task_id)->update('tasks', [
            'status' => 'pending'
        ]);

        redirect('task/task_details/' . $task_id);
    }





    public function complete($task_id)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        // 1️⃣ Stop running log
        $runningLog = $this->db
            ->where('task_id', $task_id)
            ->where('end_time IS NULL', null, false)
            ->get('task_work_logs')
            ->row();

        if ($runningLog) {
            $end = date('Y-m-d H:i:s');
            $seconds = strtotime($end) - strtotime($runningLog->start_time);

            $this->db->where('id', $runningLog->id)->update('task_work_logs', [
                'end_time' => $end,
                'duration_seconds' => $seconds
            ]);
        }

        // 2️⃣ Calculate TOTAL worked seconds
        $row = $this->db
            ->select('SUM(duration_seconds) AS total_seconds')
            ->where('task_id', $task_id)
            ->get('task_work_logs')
            ->row();

        $totalSeconds = (int) ($row->total_seconds ?? 0);
        $totalMinutes = floor($totalSeconds / 60);

        // 3️⃣ Update task with worked time
        $this->db->where('id', $task_id)->update('tasks', [
            'total_minutes' => $totalMinutes,
            'status' => 'completed',
            'completed_at' => date('Y-m-d H:i:s')
        ]);

        redirect('emp/dashboard');
    }








    public function history()
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $data['history'] = $this->Task_model->get_user_task_history(
            $this->session->userdata('user_id')
        );

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/task_history', $data);
        $this->load->view('Userside/footer');
    }


    /* =====================================================
   USER – SIMPLE TASK LIST (PROJECT + TASK)
===================================================== */
    public function task_list()
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $user_id = $this->session->userdata('user_id');

        $data['tasks'] = $this->Task_model->get_user_tasks($user_id);

        // 🔥 currently running task (if any)
        $runningTask = $this->Task_model->get_running_task_by_user($user_id);
        $data['running_task_id'] = $runningTask ? (int) $runningTask->id : null;


        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/task_list', $data);
        $this->load->view('emp/footerr');
    }



    public function project_tasks($project_id)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        $user_id = $this->session->userdata('user_id');

        $data['tasks'] = $this->Task_model
            ->get_tasks_by_project_user($project_id, $user_id);

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/task_list', $data);
        $this->load->view('emp/footerr');
    }


    public function task_details($task_id = null)
    {
        if ($this->session->userdata('user_role') != 0) {
            if ($this->session->userdata('user_role') == 1) {
                redirect('admin/dashboard');
            } else if ($this->session->userdata('user_role') == 2) {
                redirect('sales/dashboard');
            } else {
                redirect('sign_in');
            }
        }

        if (!$task_id) {
            show_404();
        }

        $user_id = $this->session->userdata('user_id');

        $details = $this->Task_model->get_task_details_with_logs($task_id, $user_id);
        if (!$details) {
            show_404();
        }

        $runningTask = $this->Task_model->get_running_task_by_user($user_id);
        $runningLog = $this->Task_model->get_running_log_by_user($task_id, $user_id);

        $data['task'] = $details['task'];
        $data['logs'] = $details['logs'];

        $data['running_task_id'] = $runningTask ? (int) $runningTask->id : null;
        $data['is_other_task_running'] =
            ($runningTask && (int) $runningTask->id !== (int) $task_id);

        // 🔥 THIS WAS MISSING
        $data['running_log'] = $runningLog ? true : false;

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/task_details', $data);
        $this->load->view('emp/footerr');
    }


    public function task_logs($task_id)
    {
        $logs = $this->Task_model->get_task_logs_full($task_id);
        $data['logs'] = $logs;

        $this->load->view('header');
        $this->load->view('admin/task_logs', $data);
        $this->load->view('footer');
    }
}
