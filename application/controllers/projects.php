<?php

class Projects extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('project_message', "<script> swal('Oohs','Sorry, you are suppose to log in first','error'); </script>");
			redirect('home/index');
		}
	}

	public function index() {
		$data['projects'] = $this->project_model->get_projects();

		$data['main_view'] = "projects/index";
		$this->load->view('layout/main', $data);
	}
	public function display($project_id) {
		$data['completed_tasks'] = $this->project_model->get_project_tasks($project_id, true);
		$data['not_completed_tasks'] = $this->project_model->get_project_tasks($project_id, false);
		$data['project_data'] = $this->project_model->get_project($project_id);
		$data['main_view'] = "projects/show_pro";
		$this->load->view('layout/main', $data);
	}
	public function create() {
		$this->form_validation->set_rules('projectname', 'Project Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('projectbody', 'Project Body', 'trim|required|min_length[9]');

		if ($this->form_validation->run() == false) {
			$data['main_view'] = "projects/create_pro";
			$this->load->view('layout/main', $data);
		} else {
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'pro_name' => $this->input->post('projectname'),
				'pro_body' => $this->input->post('projectbody'),
			);
			if ($this->project_model->create_project($data)) {
				$this->session->set_flashdata('pro_success', "<script> swal('Congrats','New Project created','success'); </script>");
				redirect('projects/index');
			} else {
				$this->session->set_flashdata('pro_success', "<script> swal('Sorry'.'Error creating project','error'); </script>");
			}
		}
	}
	public function edit($project_id) {
		$this->form_validation->set_rules('projectname', 'Project Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('projectbody', 'Project Body', 'trim|required|min_length[9]');

		if ($this->form_validation->run() == false) {
			$data['project_data'] = $this->project_model->get_projects_info($project_id);
			$data['main_view'] = "projects/edit_pro";
			$this->load->view('layout/main', $data);
		} else {
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'pro_name' => $this->input->post('projectname'),
				'pro_body' => $this->input->post('projectbody'),
			);
			if ($this->project_model->edit_project($project_id, $data)) {
				$this->session->set_flashdata('pro_updated', "<script> alertify.success('Project Updated'); </script>");
				redirect('projects/index');
			}
		}

	}
	public function delete($project_id) {
		$this->project_model->delete_project($project_id);
		$this->session->set_flashdata('pro_deleted', "<script> swal('Sorry','Project Deleted','error'); </script>");
		redirect('projects/index');
	}

}

?>