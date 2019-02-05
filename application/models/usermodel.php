<?php

class Usermodel extends CI_Model{

	public function user_info($id)
	{
		//$id=$this->session->userdata('id');
		
		$q = $this->db->select()
						->from('article as a')
						->join('users as u','a.user_id=u.user_id')
						->where('u.user_id',$id)
						->get();
		return $q->result();
	}

	public function profile_info($id)
	{
		$q = $this->db->select()
						->from('users')
						->where('user_id',$id)
						->get();
		return $q->row();
	}

	public function user_signup($post)
	{
		$uname  = $post['uname'];
		$fname  = $post['fname'];
		$lname  = $post['lname'];
		$email  = $post['email'];
		$gender = $post['gender'];
		$country= $post['country'];
		$pwd = $post['pwd'];

		$q = $this->db->insert('users',['uname'=>$uname,'password'=>$pwd,'fname'=>$fname,'lname'=>$lname,'email'=>$email,'gender'=>$gender,'country'=>$country ] );

		return $q;
	}

	public function user_login($post)
	{
		$email = $post['email'];
		$pwd = $post['pwd'];

		$q = $this->db 	->where('email',$email)
						->where('password',$pwd)
						->from('users')
						->get();

		if ( count($q->row() )>=1 ) {
			
			return $q->row();
			
		} else{
			return FALSE;
		}
	}

	public function user_update($post)
	{
		//print_r($post); exit();
		$id = $post['user_id'];
		//$i = $post['image'];

		$q = $this->db 	->where('user_id',$id)
						->update('users',$post);

		return $q;
	}



}