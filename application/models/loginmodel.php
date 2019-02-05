<?php
class Loginmodel extends CI_Model{

	public function login_validate($username,$password){
		$q=$this->db->where('name',$username)
					->where('password',$password)
					->from('admin')
					->get();
//SELECT * FROM admin WHERE name='$username' AND password='$password';

		if (count($q->row())>=1) { //OR if ($q->num_rows()>=1)
			
			return $q->row()->id;//return $q->row_array();

		} else{
			return FALSE;
		}
	}

}