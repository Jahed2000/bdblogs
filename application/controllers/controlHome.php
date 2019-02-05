<?php
	
	class controlHome extends CI_Controller{

		public function index()
		{
			//$this->load->model('userlist');

			$data = $this->userlist->getUser();
			
			$this->load->view('viewHome',['user'=>$data]);

		}

	}