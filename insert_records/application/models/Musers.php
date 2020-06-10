<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musers extends CI_Model {

	public function get_allusers() {
		$users = $this->db->get('users');

		if($users->num_rows() > 0) {
			return $users->result();
		}

		return false;
	}

	public function add_newuser($data) {
		$add_user = $this->db->insert('users' , $data);

		if(!$add_user) {
			return false;
		}

		return true;
	}
}