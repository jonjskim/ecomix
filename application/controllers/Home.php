<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->model("Book");
		$books= $this->Book->getBooks();
		$this->load->view('Home', array(('books') => $books));
	}
}























