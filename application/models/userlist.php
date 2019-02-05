<?php

class Userlist extends CI_Model{
	
	public function getUser(){
		$this->load->database();

		//OR $q = $this->db->query("SELECT * FROM users");
		 $q= $this->db->get('users');
		return $q->row_array();

	}
}