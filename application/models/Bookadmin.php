<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookadmin extends CI_Model {

	public function insertBook($input) {
		$sql = "INSERT INTO books (title, author, price, created_at) VALUES (?, ?, ?, ?)";
		$values = (array($input['title'], $input['author'], $input['price'], date("Y-m-d H:i:s")));
		$this->db->query($sql, $values);
		$booksql = "SELECT * FROM books WHERE title = ?";
		$values = (array($input['title']));
		return $this->db->query($booksql, $values)->row_array();
	}

	public function getOrder() {
		$sql = "SELECT * FROM users WHERE users.id IN (SELECT user_id FROM paids)";
		return $this->db->query($sql)->result_array();
	}
	public function viewOrder($id) {
		$sql = "SELECT * FROM paids JOIN books on book_id = books.id where user_id = ?";
		return $this->db->query($sql, $id)->result_array();
	}

	public function viewUser($id) {
		$sql = "SELECT * FROM addresses JOIN users on user_id = users.id WHERE user_id = ?";
		return $this->db->query($sql, $id)->row_array();
	}

	public function shipped($id) {
		$sql = "DELETE FROM paids WHERE user_id = ?";
		$this->db->query($sql, $id);
	}


}