<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
			// FUNCTION TO PUT THE USER INPUT INFORMATION INTO THE DATABASE
	public function insertUser($input) {
		$sql = "INSERT INTO users (first_name, last_name, email, password)
							VALUES (?, ?, ?, ?)";
		$values = (array($input['first_name'], $input['last_name'], $input['email'], $input['password']));
			// THIS LINE TELLS FUNCTION TO RUN THE QUERY WITH ($sql, $values)
		return $this->db->query($sql, $values);
	}

	public function getUser($input) {
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = (array($input['email'], $input['password']));
		return $this->db->query($sql, $values)->row_array();
		//^ WE NEED TO PUT THE QUERY INTO AN ARRAY SO THAT WE CAN STORE THE ARRAY INTO THE SESSION. THIS LETS THE SERVER KNOW THAT THE USER IS LOGGED IN WHEN BROWSING THE WEBSITE
	}

	public function viewAdmin($user_id) {
		$sql = "SELECT * FROM admins LEFT JOIN users ON user_id = users.id WHERE user_id = ?";
		return $this->db->query($sql, $user_id)->row_array();
	}
}