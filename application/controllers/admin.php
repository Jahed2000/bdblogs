<?php

class Admin extends MY_Controller{

	public function index(){

		if ($this->session->userdata('admin_id')) :
			return redirect('articles/dashboard');
		 else:
			return redirect('admin/login');
		endif;
	}

	public function login(){
		
		if ($this->session->userdata('admin_id')) :
			return redirect('articles/dashboard');
			else:
		$this->load->view('admin/admin_login');
	endif;
	}

	public function verify_login(){

		//$this->form_validation->set_rules('username', 'Username', 'required|alpha');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		//check articles controller for alternate rules set method

		if($this->form_validation->run('admin_login')){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->load->model('loginmodel');

			if ($admin=$this->loginmodel->login_validate($username,$password)) {
				//$id=$admin['id'];

				$this->load->library('session');

				$this->session->set_userdata('admin_id',$admin);
				//echo $this->session->admin_id;
				return redirect('articles/dashboard'); //redirects to admin controllers dashboard function
				
			} else{
				$this->session->set_flashdata('login_failed','Invalid Username/Password');//temporary session data thats cleared after next request
				return redirect('admin/login');
			}

		} else{
			
			$this->load->view('admin/admin_login');
			
		}
	}


	public function logout(){

		$this->session->unset_userdata('admin_id');
		return redirect('admin/login');
	}

}
