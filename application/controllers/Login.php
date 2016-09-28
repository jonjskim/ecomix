<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {

		$this->load->view('Login');
	}
	public function register() {
		//FORM VALIDATION
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");
			// RUN VALIDATION, IF IT FAILS PUT IT INTO "registration_messages" ARRAY
			// AND DISPLAY IT IN THE REGISTRATION VIEW "redirect('/')"
		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("registration_messages", validation_errors());
			redirect('/Login');
		} else {
				// PASS THE INFO TO THE MODEL (Login) TO INSERT INFO INTO ecomixdb
				// GRAB FROM THE MODEL POST, method="POST"
			$this->load->model("User");
			$input = $this->input->post();			
			$insert_user = $this->User->insertUser($input);
		}
		//AFTER INSERTING USER IF IT IS SUCCESSFUL IT WILL ASK TO LOG IN, ELSE IT WILL PRESENT THE ERROR MESSAGE
		if($insert_user) {
			$this->session->set_flashdata("registration_messages", "Registration is complete, please log in to continue");			
			redirect('/Login');
		} else {
			$this->session->set_flashdata("registration_messages", "Sorry but your info were not registered please try again.");
			redirect('/Login');
		}
	}

	public function userLogin() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", 
			"trim|min_length[8]|required|md5");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("login_errors", "Email/Password combination not valid, try again");
			redirect('/Login');
		} else {
			$this->load->model("User");
			$input = $this->input->post();
			$get_user = $this->User->getUser($input);
		}
		// ^ WE'RE GOING TO INPUT THE USER INFO INTO A VARIABLE get_user AND RUN THE FUNCTION get_user IN THE USER MODEL
		if ($get_user) {
			$this->session->set_userdata("currentUser", $get_user);
			redirect('/Books');  //REDIRECT USER TO NEXT PAGE///
		} else {
			$this->session->set_flashdata("login_errors", "Email/Password combination not valid, try again");
			redirect('/Login');
		}
	}

		public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}