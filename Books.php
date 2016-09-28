<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Book");

	}

	public function index() {
		$user_id = $this->session->userdata['currentUser']['id'];
		$books= $this->Book->getBooks();
		$carts = $this->Book->getCart($user_id);
		$this->load->model("User");
		$admin = $this->User->viewAdmin($user_id);
		$this->load->view('Book', array('books' => $books,
										'carts' => $carts,
										'admin' => $admin));
	}

	public function viewBook($id) {
		$user_id = $this->session->userdata['currentUser']['id'];
		$book = $this->Book->viewBookById($id);
		$reviews = $this->Book->revewByBookId($id);
		$carts = $this->Book->getCart($user_id);
		$this->load->view("Bookdetail",  array('book' => $book,
											   'reviews' => $reviews,
											   'carts' => $carts)
						 );
	}
		public function viewCart() {
		$user_id = $this->session->userdata['currentUser']['id'];
		$carts = $this->Book->getCart($user_id);
		$address = $this->Book->getAddressByUserId($user_id);
		$this->load->view("Cart",  array('carts' => $carts,
										 'address' => $address));
	}

	public function addBookFromHome($id) {
		$user_id = $this->session->userdata['currentUser']['id'];
		$this->Book->addBookById($user_id, $id);
		redirect("/Books");
	}

	public function addBookFromDetail($id) {
		$user_id = $this->session->userdata['currentUser']['id'];
		$this->Book->addBookById($user_id, $id);
		redirect("/Books/viewBook/$id");
	}

	public function removeCart($id) {
		$user_id = $this->session->userdata['currentUser']['id'];
		$this->Book->removeBookFromCart($user_id, $id);
		redirect("/Books/viewCart");
	}

	public function addReview($id) {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("review", "Review", "trim|min_length[8]|required");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("review_messages", "Thanks for rating but please add a review");
			redirect("/Books/viewBook/$id");
		} else {
			$input = $this->input->post();
			$user_id = $this->session->userdata['currentUser']['id'];
			$this->Book->addReview($id, $input, $user_id);
			redirect("/Books/viewBook/$id");
		}	
	}

	public function insertAddress() {
		//FORM VALIDATION
		$this->load->library("form_validation");
		$this->form_validation->set_rules("street_number", "Street Number", "trim|required");
		$this->form_validation->set_rules("city", "City", "trim|required");
		$this->form_validation->set_rules("state", "State", "trim|required");
		$this->form_validation->set_rules("zipcode", "Zipcode", "trim|required");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("messages", validation_errors());
			redirect('/Books/viewCart');

		} else {
			$input = $this->input->post();
			$user_id = $this->session->userdata['currentUser']['id'];		
			$insert_address = $this->Book->insertAddress($input, $user_id);
		}
		//AFTER INSERTING USER IF IT IS SUCCESSFUL IT WILL ASK TO LOG IN, ELSE IT WILL PRESENT THE ERROR MESSAGE
		if($insert_address) {
			$this->session->set_flashdata("messages", "Address is added, please continue");			
			redirect('/Books/viewCart');
		} else {
			$this->session->set_flashdata("registration_messages", "Sorry but your info were not added please try again.");
			redirect('/Books/viewCart');
		}
	}




}
