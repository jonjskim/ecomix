<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("Bookadmin");
		
	}

	public function index() {
			$user_id = $this->session->userdata['currentUser']['id'];
			$this->load->model("User");
			$admin = $this->User->viewAdmin($user_id);
			$orders = $this->Bookadmin->getOrder();
			$this->load->view('Admin', array('admin' => $admin, 'orders' => $orders));
	}

	public function img_upload($book_id) {
		$config['upload_path']          = 'assets/images/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;         
		$config['file_name']            = $book_id;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')) {
		     
		       $this->session->set_flashdata("messages", 'unable to upload, please try again');

		} else {
		       $this->session->set_flashdata("messages", 'Success');

		}
	}

    public function do_upload() {
    	$input = $this->input->post();
    	$insert_book = $this->Bookadmin->insertBook($input);
		$book_id = $insert_book['id'];
		$this->img_upload($book_id);
		$this->load->view('Admin');
	}

	public function viewOrderById ($id) {
		$orderLists = $this->Bookadmin->viewOrder($id);
		$user = $this->Bookadmin->viewUser($id);
		$this->load->view('Order', array('orderLists' => $orderLists, 'user' => $user));
	}

	public function shipped($id) {
		$user = $this->Bookadmin->shipped($id);
		redirect('Admin');
	}


}