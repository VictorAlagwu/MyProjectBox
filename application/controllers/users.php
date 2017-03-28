<?php
/*
Name: Victor Alagwu
Email: victoralagwu@gmail.com(+234(81)70449567)
Project: MyProjectBox :- Was done as a project when learning Codeigniter using Edwin Daiz Tutorial
 */
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
				$username = $this->input->post('username');
				$this->session->set_flashdata('reg_success', "<script> swal('Welcome','Thanks for registering  $username','success'); </script>");
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
				$this->session->set_flashdata('login_success', "<script> swal('Wow','Welcome $username','success'); </script>");
				// $this->session->set_flashdata('login_success', "<script> alertify.success('Welcome $username'); </script>");
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
	public function resetRequest() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]');
		if ($this->form_validation->run() == false) {
			$data['main_view'] = 'users/reset';
			$this->load->view('layout/side', $data);
			$data = array(
				'errors' => validation_errors(),
			);
			$this->session->set_flashdata($data);
			// redirect('home');
		} else {
			$email = $this->input->post('email');
			$token = md5(uniqid(rand(), true));
			$complete = 'No';
			$data = array(
				'resetToken' => $token,
				'resetCompleted' => $complete,
			);

			$check_mail = $this->user_model->check_email($email);
			if ($check_mail) {
				$user_request = $this->user_model->send_reset($email, $data);
				$this->session->set_flashdata('reg_success', "<script> swal('Congrats','Reset Link Sent to $email','success'); </script>");
				redirect('home/index');
			} else {
				$this->session->set_flashdata('login_fail', "<script> swal('Oops','Email not in our database','error'); </script>");
				redirect('home/index');

			}
		}

	}
	public function resetPassword() {
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
		if ($this->form_validation->run() == false) {
			$data['main_view'] = 'users/resetPassword';
			$this->load->view('layout/side', $data);

		} else {
			$token_link = $this->input->get('key', false);
			$password = $this->input->post('password');
			$time_pass = ['cost' => 12];
			$hash_password = password_hash($password, PASSWORD_BCRYPT, $time_pass);
			$data = array(
				'user_password' => $hash_password,
				'resetCompleted' => 'Yes',
			);
			$checktoken = $this->user_model->check_token($token_link);
			if ($checktoken) {
				$updatepassword = $this->user_model->update_password($token_link, $data);
				$this->session->set_flashdata('login_fail', "<script> swal('Ok','Token have been sent to database','success'); </script>");
				redirect('home/index');
			} else {

				$this->session->set_flashdata('login_fail', "<script> swal('Oops','Token not in our database','error'); </script>");
				redirect('home/index');

			}

		}
	}

}

?>