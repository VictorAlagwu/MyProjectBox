<?php
/**
 *x
 */
class Task_model extends CI_Model {
	public function get_tasks($task_id) {
		$this->db->where('id', $task_id);
		$call = $this->db->get('tasks');
		return $call->row();
	}
	public function create_task($data) {
		$data_input = $this->db->insert('tasks', $data);
		return $data_input;
	}
	public function delete_task($id) {
		$this->db->where('id', $id);
		$this->db->delete('tasks');

	}
	public function edit_task($task_id, $data) {
		$this->db->where('id', $task_id);
		$this->db->update('tasks', $data);
		return true;
	}
	public function get_project_name($project_id) {
		$this->db->where('id', $project_id);
		$query = $this->db->get('projects');
		return $query->row();
	}
	public function get_task_project_id($task_id) {
		$this->db->where('id', $task_id);
		$get_data = $this->db->get('tasks');
		return $get_data->row()->project_id;

	}

	public function get_task_project_data($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('tasks');
		return $query->row();

	}
	public function complete_task($id) {
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update('tasks');
		return true;

	}
	public function change_to_active($id) {
		$this->db->set('status', 0);
		$this->db->where('id', $id);
		$this->db->update('tasks');
		return true;
	}
}
?>