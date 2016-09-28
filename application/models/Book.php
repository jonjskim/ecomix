<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {

	public function getBooks() {
		$sql = "SELECT * FROM books ORDER BY created_at DESC";
		return ($this->db->query($sql)->result_array());
	}

	public function viewBookById($id) {
		$sql = "SELECT * FROM books where id = ?";
		return $this->db->query($sql,$id)->row_array(); 
	}
	public function revewByBookId($id) {
		$sql = "SELECT reviews.*, users.first_name, users.last_name FROM reviews JOIN users ON user_id = users.id where book_id = ? ORDER BY created_at DESC";
		return $this->db->query($sql,$id)->result_array(); 
	}

	public function addReview($id, $input, $user_id) {
		$sql = "INSERT INTO reviews (content, rating, user_id, book_id, created_at)
							VALUES (?, ?, ?, ?, ?)";
		$values = (array($input['review'], $input['rating'], $user_id, $id,date("Y-m-d H:i:s")));
			// THIS LINE TELLS FUNCTION TO RUN THE QUERY WITH ($sql, $values)
		return $this->db->query($sql, $values);
	}

	public function addBookById($user_id, $id) {
		$sql = "INSERT INTO user_buy_book (user_id, book_id)
								   VALUES (?, ?)";
		$values = (array($user_id, $id));
		$this->db->query($sql, $values);
	}

	public function getCart($user_id) {
		$sql = "SELECT * FROM user_buy_book LEFT JOIN books ON book_id = books.id where user_id = ? ORDER BY title DESC";
		return $this->db->query($sql, $user_id)->result_array();
	}

	public function removeBookFromCart($user_id, $id) {
		$sql = "DELETE FROM user_buy_book WHERE user_id = ? AND book_id = ?";
		$values = array($user_id, $id);
		$this->db->query($sql, $values);
	}

	public function paymentComplete($user_id) {
		$sql = "DELETE FROM user_buy_book WHERE user_id = ?";
		$this->db->query($sql, $user_id);
	}

	public function addBookToPaids($user_id, $id) {
	$sql = "INSERT INTO paids (user_id, book_id)
							   VALUES (?, ?)";
	$values = (array($user_id, $id));
	$this->db->query($sql, $values);
	}

	public function insertAddress($input, $user_id){
		$sql = "INSERT INTO addresses (street_number, city, state, zipcode, user_id)
							VALUES (?, ?, ?, ?, ?)";
		$values = (array($input['street_number'], $input['city'], $input['state'], $input['zipcode'], $user_id));
			// THIS LINE TELLS FUNCTION TO RUN THE QUERY WITH ($sql, $values)
		return $this->db->query($sql, $values);	
	}

	public function getAddressByUserId($user_id) {
		$sql = "SELECT * FROM addresses WHERE user_id = ?";
		return $this->db->query($sql, $user_id)->row_array();
	}



























}	