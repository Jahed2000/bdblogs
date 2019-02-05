<?php

class User extends MY_Controller{

	public function index()
	{	
		$this->load->model('articlemodel');
		$this->load->library('pagination');

		$config = [
				'base_url' 			=> base_url('user/index'),
				'per_page' 			=> 5,
				'total_rows' 		=> $this->articlemodel->numrows(),
				
				'full_tag_open' => '<ul class="pagination">',
		        'full_tag_close' => '</ul>',
		        'num_tag_open' => '<li class="page-item">',
		        'num_tag_close' => '</li>',
		        'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
		        'cur_tag_close' => '</a></li>',
		        'next_tag_open' => '<li class="page-item">',
		        'next_tagl_close' => '</a></li>',
		        'prev_tag_open' => '<li class="page-item">',
		        'prev_tagl_close' => '</li>',
		        'first_tag_open' => '<li class="page-item disabled">',
		        'first_tagl_close' => '</li>',
		        'last_tag_open' => '<li class="page-item">',
		        'last_tagl_close' => '</a></li>',
		        'attributes' => array('class' => 'page-link','style'=>''),
		    ];

		$this->pagination->initialize($config);

		$articles = $this->articlemodel->get_all_article( $config['per_page'], $this->uri->segment(3) );
 
		$this->load->view('public/articles_list',['article'=>$articles]);
	}

	public function search_article()
	{
		$this->form_validation->set_rules('search','Search','required|min_length[2]');

		if ( $this->form_validation->run() ) {
			$post = $this->input->post('search');
			
			$this->load->model('articlemodel');
			$search_result = $this->articlemodel->search_article($post);

			$this->load->view('public/search_result',compact('search_result'));
		} else{
			$this->index();
		}
	}

	public function view_article($id)
	{

		$this->load->model('articlemodel','article');
		$article = $this->article->view_article($id);
		
		$this->load->view('public/view_article',compact('article'));
	}

	public function signup()
	{
		$this->load->view('public/signup');
	}

	public function verify_signup()
	{
		if ($this->form_validation->run('signup-rules')) {
			
			$post = $this->input->post();

			$this->load->model('usermodel');
			$this->usermodel->user_signup($post);

			$this->load->view('public/login');

		} else{
			$this->load->view('public/signup');
		}
	}

	public function login()
	{
		if ($this->session->userdata('id')) :
			return redirect('user/index');
			else:
			$this->load->view('public/login');
	endif;
	}

	public function verify_login()
	{
		if ($this->form_validation->run('user_login')) {
			
			$post = $this->input->post();
			

			$this->load->model('usermodel');

			if ($qq = $this->usermodel->user_login($post)) {
				
				$this->session->set_userdata('id',$qq->user_id);
				
				return redirect('user/index');
			} else{
				$this->session->set_flashdata('loginError','username/password invalid');
				return redirect('user/login');
			}

		} else{
			$this->load->view('public/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('user/index');
	}

	public function post_article()
	{
		$this->load->view('public/post_article');
	}


	public function user_store_article()
	{	
		$config = [	
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpg|jpeg|png|gif',
					'overwrite'=>'FALSE',
					];
		$this->load->library('upload',$config);

		 if ( $this->form_validation->run('article_rules') && $this->upload->do_upload('photo') ) {

		 	$post = $this->input->post();

		 	$data= $this->upload->data();
		 	//echo "<pre>";
		 	//print_r($data);exit;
		 	$image_path = base_url("uploads/".$data['file_name']);
		 	$post['image_path'] = $image_path;  
		 	//echo $image_path;exit;

		 	$this->load->model('articlemodel');

		if ($this->articlemodel->post_article($post)) {

		 		$this->session->set_flashdata('feedback','article posted successfully');
		 		$this->session->set_flashdata('feedback_class','alert-success');
		 	}else{
		 		$this->session->set_flashdata('feedback','failed to post article, try again');
		 		$this->session->set_flashdata('feedback_class','alert-danger');
		 	}

		 	return redirect('user/index');

		 } else{

		 	$upload_error = $this->upload->display_errors();
			$this->load->view('public/post_article',compact('upload_error') );
		 }
	}

	public function profile()
	{
		if ($this->session->userdata('id')) {
			$id = $this->session->userdata('id');
			$this->load->model('usermodel');
			$data['user'] = $this->usermodel->profile_info($id);
			$data['article'] = $this->usermodel->user_info($id);
			$this->load->view('public/profile',$data);
		} else{
			return redirect('user/login');
		}
	}

	public function update_profile()
	{	
		$id = $this->session->userdata('id');
		$this->load->model('usermodel');
		$data['user']=$this->usermodel->profile_info($id);
		$this->load->view('public/profile-update',$data);
	}

	public function update_info()
	{	
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpg|jpeg|png|gif',
					'overwrite'=>'FALSE',
				];

		$this->load->library('upload',$config);

		if ($this->upload->do_upload('image')  ) {
			$post =  $this->input->post();
			//print_r($post);exit;
			$data = $this->upload->data();
			$post['image'] = base_url("uploads/".$data['file_name'] );
			//echo $post['image'];exit;
			//print_r($data);exit;			

			$this->load->model('usermodel');

			if ($this->usermodel->user_update($post) ) {
				 
				 return redirect('user/profile');
			}

		} elseif ( $this->form_validation->run('update_rules') ){
			$post =  $this->input->post(); //print_r($post);exit;
			$this->load->model('usermodel');
			if ($this->usermodel->user_update($post) ) {
				return redirect('user/profile');
			}

		}
		 else{

			$id = $this->session->userdata('id');
			$this->load->model('usermodel');
			$data['user']=$this->usermodel->profile_info($id);
			$this->load->view('public/profile-update',$data);
		}

		
	}

	public function delete_article($article_id){

		//$article_id = $this->input->post('article_id');

		$this->load->model('articlemodel');
		if ($this->articlemodel->delete_article($article_id)) {
			$this->session->set_flashdata('feedback','article deleted');
			$this->session->set_flashdata('feedback_class','alert-success');
		} else{
			$this->session->set_flashdata('feedback','failed to delete');
			$this->session->set_flashdata('feedback_class','alert-danger');
		}

		return redirect('user/profile');

	}


	public function edit_article($article_id){
		
		$this->load->model('articlemodel');
		$art = $this->articlemodel->find_article($article_id);
		//print_r($art);
		$this->load->view('public/edit_article',['article'=>$art]);
	}

	public function update_article($article_id){

		if ($this->form_validation->run('article_rules')) {

		 	$post = $this->input->post();
		 	unset($post['submit']);
		 	$this->load->model('articlemodel');

		if ($this->articlemodel->update_article($article_id,$post)) {

		 		$this->session->set_flashdata('feedback','article updated successfully');
		 		$this->session->set_flashdata('feedback_class','alert-success');
		 	}else{
		 		$this->session->set_flashdata('feedback','failed to update article, try again');
		 		$this->session->set_flashdata('feedback_class','alert-danger');
		 	}

		 	return redirect('user/profile');

		 } else{
		 	$this->load->model('articlemodel');
			$art = $this->articlemodel->find_article($article_id);
			$this->load->view('public/edit_article',['article'=>$art]);
		 }

	}



}