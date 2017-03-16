<?php
/**
 *
 */
class Tasks extends CI_Controller {
//
	public function display($task_id) {
		$data['tasks'] = $this->task_model->get_tasks($task_id);
		$data['main_view'] = 'tasks/display';
		$this->load->view('layout/main', $data);
	}
	public function create($project_id) {
		$this->form_validation->set_rules('taskname', 'Task Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('taskbody', 'Task Body', 'trim|required|min_length[9]');

		if ($this->form_validation->run() == false) {
			$data['main_view'] = "tasks/create_task";
			$this->load->view('layout/main', $data);
		} else {
			$data = array(
				'project_id' => $project_id,
				'task_name' => $this->input->post('taskname'),
				'task_body' => $this->input->post('taskbody'),
				'due_date' => $this->input->post('due_date'),
			);
			if ($this->task_model->create_task($data)) {
				$this->session->set_flashdata('pro_success', "<script> swal('Congrats','New Task created','success'); </script>");
				redirect('projects/index');
			} else {
				$this->session->set_flashdata('pro_success', "<script> swal('Sorry'.'Error creating Task','error'); </script>");
			}
		}
	}
	public function delete($task_id) {
		$data['tasks'] = $this->task_model->delete_task($task_id);
		$this->session->set_flashdata('task_deleted', "<script> swal('Oohs','Task Deleted','error'); </script>");
		redirect('home/index');
	}
	public function edit($task_id) {
		$this->form_validation->set_rules('taskname', 'Task Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('taskbody', 'Task Body', 'trim|required|min_length[9]');

		if ($this->form_validation->run() == false) {
			$data['project_id'] = $this->task_model->get_task_project_id($task_id);
			$data['project_name'] = $this->task_model->get_project_name($data['project_id']);
			$data['task_view'] = $this->task_model->get_task_project_data($task_id);

			$data['main_view'] = "tasks/edit_task";
			$this->load->view('layout/main', $data);
		} else {
			$project_id = $this->task_model->get_task_project_id($task_id);
			$data = array(
				'project_id' => $project_id,
				'task_name' => $this->input->post('taskname'),
				'task_body' => $this->input->post('taskbody'),
				'due_date' => $this->input->post('due_date'),
			);
			if ($this->task_model->edit_task($task_id, $data)) {
				// $this->session->set_flashdata('pro_success', "<script> swal('Congrats','Task updated','success'); </script>");
				$this->session->set_flashdata('pro_success', "<script> alertify.success('Task updated successful'); </script>");
				redirect('projects/index');
			} else {
				$this->session->set_flashdata('pro_success', "<script> alertify.error('Error creating Task'); </script>");
			}
		}
	}
	public function active($task_id) {
		if ($this->task_model->change_to_active($task_id)) {
			$project_id = $this->task_model->get_task_project_id($task_id);
			$this->session->set_flashdata('task_active', "<script> alertify.success('Task still active'); </script>");
			redirect('projects/display/' . $project_id . '');
		}
	}
	public function completed($task_id) {
		if ($this->task_model->complete_task($task_id)) {
			$project_id = $this->task_model->get_task_project_id($task_id);
			$this->session->set_flashdata('task_active', "<script> swal('Congrats','Task Completed','success'); </script>");
			redirect('projects/display/' . $project_id . '');

		}
	}

}

?>