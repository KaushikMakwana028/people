<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Project_model');
        $this->load->model('Task_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('sign_in');
        }

        if ($this->session->userdata('user_role') != 1) {
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

    public function index()
    {
        $this->all_projects();
    }

    public function add()
    {
        redirect('project/all_projects');
    }

    public function store()
    {
        $project_id = $this->Project_model->insert_project($this->projectPayload());
        $this->session->set_flashdata('success', 'Project created successfully.');
        redirect('project/all_projects');
    }

    public function edit($id)
    {
        redirect('project/all_projects');
    }

    public function update($id)
    {
        if (!$this->Project_model->get_project($id)) {
            show_404();
        }

        $this->Project_model->update_project($id, $this->projectPayload(false));
        $this->session->set_flashdata('success', 'Project updated successfully.');
        redirect('project/all_projects');
    }

    public function all_projects()
    {
        $data['projects'] = $this->Project_model->get_all_projects();
        $data['payment_logs'] = $this->Project_model->get_payment_logs();

        $this->load->view('admin/header');
        $this->load->view('admin/project_management', $data);
        $this->load->view('admin/footer');
    }

    public function clients()
    {
        $clients = [];

        foreach ($this->Project_model->get_all_projects() as $project) {
            $key = strtolower(trim(($project->client_email ?: $project->client_name) ?: 'unknown-' . $project->id));

            if (!isset($clients[$key])) {
                $clients[$key] = (object) [
                    'client_name' => $project->client_name ?: 'Unknown Client',
                    'client_email' => $project->client_email ?: '',
                    'client_phone' => $project->client_phone ?: '',
                    'company' => $project->client_name ?: '—',
                    'total_projects' => 0,
                    'total_revenue' => 0,
                    'project_id' => $project->id,
                ];
            }

            $clients[$key]->total_projects++;
            $clients[$key]->total_revenue += (float) ($project->total_amount ?? 0);
        }

        $data['clients'] = array_values($clients);

        $this->load->view('admin/header');
        $this->load->view('admin/clients', $data);
        $this->load->view('admin/footer');
    }

    public function view($id)
    {
        $project = $this->Project_model->get_project_summary($id);

        if (!$project) {
            show_404();
        }

        $data['project'] = $project;
        $data['requirements'] = $this->Project_model->get_project_requirements($id);
        $data['payment_logs'] = $this->Project_model->get_payment_logs($id);

        $this->load->view('admin/header');
        $this->load->view('admin/project_detail', $data);
        $this->load->view('admin/footer');
    }

    public function add_requirement()
    {
        $project_id = (int) $this->input->post('project_id');

        if (!$project_id || !$this->Project_model->get_project($project_id)) {
            show_404();
        }

        $this->Project_model->insert_requirement([
            'project_id' => $project_id,
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'amount' => (float) $this->input->post('amount', true),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Additional requirement added successfully.');
        redirect('project/view/' . $project_id);
    }

    public function add_payment()
    {
        $project_id = (int) $this->input->post('project_id');

        if (!$project_id || !$this->Project_model->get_project($project_id)) {
            show_404();
        }

        $this->Project_model->insert_payment_log([
            'project_id' => $project_id,
            'amount' => (float) $this->input->post('amount', true),
            'payment_date' => $this->input->post('payment_date', true),
            'payment_mode' => $this->input->post('payment_mode', true),
            'notes' => $this->input->post('notes', true),
            'created_by' => $this->session->userdata('user_id') ?: null,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Payment log added successfully.');
        redirect('project/view/' . $project_id);
    }

    public function project_data($id)
    {
        $project = $this->Project_model->get_project_summary($id);

        if (!$project) {
            show_404();
        }

        header('Content-Type: application/json');
        echo json_encode([
            'project' => $project,
            'requirements' => $this->Project_model->get_project_requirements($id),
            'payment_logs' => $this->Project_model->get_payment_logs($id),
        ]);
    }

    public function project_tasks($project_id)
    {
        $user_id = $this->session->userdata('user_id');
        $data['tasks'] = $this->Task_model->get_tasks_by_project_user($project_id, $user_id);

        $this->load->view('emp/headerr', $this->headerData());
        $this->load->view('Userside/task_list', $data);
        $this->load->view('emp/footerr');
    }

    public function tasks_by_project($project_id = null)
    {
        if (!$project_id) {
            redirect('project/all_projects');
            return;
        }

        $data['tasks'] = $this->Project_model->get_tasks_by_project($project_id);

        $this->load->view('admin/header');
        $this->load->view('admin/tasks_by_project', $data);
        $this->load->view('admin/footer');
    }

    public function task_logs($task_id)
    {
        $data['logs'] = $this->Project_model->get_logs_by_task($task_id);

        $this->load->view('admin/header');
        $this->load->view('admin/task_logs', $data);
        $this->load->view('admin/footer');
    }

    public function projects_by_user($user_id = null)
    {
        $user_id = $user_id ?: $this->session->userdata('user_id');
        $data['projects'] = $this->Project_model->get_projects_by_user($user_id);

        $this->load->view('admin/header');
        $this->load->view('admin/my_projects', $data);
        $this->load->view('admin/footer');
    }

    public function delete($id)
    {
        if (!$id || !$this->Project_model->get_project($id)) {
            show_404();
        }

        $this->Project_model->delete_project($id);
        $this->session->set_flashdata('success', 'Project deleted successfully.');
        redirect('project/all_projects');
    }

    private function projectPayload($includeCreated = true)
    {
        $payload = [
            'project_name' => $this->input->post('project_name', true),
            'project_description' => $this->input->post('project_description', true),
            'client_name' => $this->input->post('client_name', true),
            'client_email' => $this->input->post('client_email', true),
            'client_phone' => $this->input->post('client_phone', true),
            'status' => $this->input->post('status', true) ?: 'active',
            'base_amount' => (float) $this->input->post('base_amount', true),
            'progress' => (int) $this->input->post('progress', true),
            'start_date' => $this->input->post('start_date', true) ?: null,
            'due_date' => $this->input->post('due_date', true) ?: null,
            'user_id' => $this->session->userdata('user_id'),
        ];

        if ($includeCreated) {
            $payload['created_at'] = date('Y-m-d H:i:s');
        }

        return $payload;
    }
}
