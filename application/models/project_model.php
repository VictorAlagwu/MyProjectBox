<?php
/**
 * Just Another model for the controller
 */
class project_model extends CI_Model {
	public function get_project($id) {
		$this->db->where("id", $id);
		$query = $this->db->get('projects');

		return $query->row();
	}
	public function get_projects() {
		$query = $this->db->get('projects');
		return $query->result();
	}

	public function get_all_project($user_id) {
		$this->db->where('project_user_id', $user_id);
		$con = $this->db->get('projects');
		return $con->result();
	}
	//Function for creating projects
	public function create_project($data) {
		$data_put = $this->db->insert('projects', $data);
		return $data_put;
	}
	public function delete_project($id) {
		$this->db->where('id', $id);
		$this->db->delete('projects');

	}
	public function edit_project($project_id, $data) {
		$this->db->where('id', $project_id);
		$this->db->update('projects', $data);
		return true;

	}
	public function get_projects_info($project_id) {
		$this->db->where("id", $project_id);
		$get_data = $this->db->get('projects');

		return $get_data->row();
	}
}
5
?>