<?php

class Users extends CI_Controller {
	public function register() {

		$this->form_validation->set_rules('username', 'User-Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('firstname', 'First-Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
		if ($this->form_validation->run() == false) {

			$data['main_view'] = 'users/register';
			$this->load->view('layout/main', $data);
		} else {
			if ($this->user_model->create_users()) {
				$this->session->set_flashdata('reg_success', "<script> swal('Welcome','Our new user','success'); </script>");
				redirect('home/index');
			} else {
				echo "User Not Created";
			}

		}

	}
	public function login() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

		if ($this->form_validation->run() == false) {
			$data = array(
				'errors' => validation_errors(),
			);
			$this->session->set_flashdata($data);
			redirect('home');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->user_model->login_users($username, $password);
			if ($user_id) {
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true,
				);
				// echo $user_data;
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success', "<script> swal('Wow','You just login successfully','success'); </script>");
				redirect('home');
				$data['main_view'] = "admin";
				$this->load->view('layout/main', $data);
			} else {

				$this->session->set_flashdata('login_fail', "<script> swal('Oohs','There was an error logining you in','error'); </script>");
				redirect('home/index');

			}

		}

	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('home/index');
	}

}

?>