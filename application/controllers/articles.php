<?php

class Articles extends MY_Controller{

	public function index(){
		$this->load->view('admin/dashboard');
	}

	public function dashboard(){
		$this->load->model('articlemodel');
		$this->load->library('pagination');

		$config = [
				'base_url' 			=> base_url('articles/dashboard'),
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
		$article = $this->articlemodel->get_article( $config['per_page'], $this->uri->segment(3) );
		//above parameters for pagination, limit and start of row 
		$this->load->view('admin/dashboard',['art'=>$article]);

	}

	public function add_article(){
		 $this->load->view('admin/add_article');	
	}

	public function store_article(){

		$config = [	
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpg|jpeg|png|gif',
					'overwrite'=>'FALSE',
					];
		$this->load->library('upload',$config);

		 //$this->form_validation->set_rules('title','Title','required|trim|min_length[6]|max_length[20]');
		 //$this->form_validation->set_rules('body','Body','required|trim|min_length[60]|max_length[260]');
		//above rules are set in config.php file
		 if ($this->form_validation->run('article_rules') && $this->upload->do_upload('photo') ) {
//echo "success11";exit;
		 	//$title=$this->input->post('title');
		 	//$body=$this->input->post('body');

		 	$post = $this->input->post();

		 	//takes all form fields data as an array into $post
		 	//print_r($post);exit;
		 	$data= $this->upload->data();
		 	//echo "<pre>";
		 	//print_r($data);exit;
		 	$image_path = base_url("uploads/".$data['file_name']);
		 	$post['image_path'] = $image_path;
		 	//unset($post['submit']); removes 'post'=>'submit' array element from what post() array returned

		 	$this->load->model('articlemodel');

		if ($this->articlemodel->post_article($post)) {

		 		$this->session->set_flashdata('feedback','article posted successfully');
		 		$this->session->set_flashdata('feedback_class','alert-success');
		 	}else{
		 		$this->session->set_flashdata('feedback','failed to post article, try again');
		 		$this->session->set_flashdata('feedback_class','alert-danger');
		 	}

		 	return redirect('articles/dashboard');

		 } else{
			$this->load->view('admin/add_article');
		 }
	}



	public function edit_article($article_id){
		
		$this->load->model('articlemodel');
		$art = $this->articlemodel->find_article($article_id);
		//print_r($art);
		$this->load->view('admin/edit_article',['article'=>$art]);
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

		 	return redirect('articles/dashboard');

		 } else{
		 	$this->load->model('articlemodel');
			$art = $this->articlemodel->find_article($article_id);
			$this->load->view('admin/edit_article',['article'=>$art]);
		 }

	}

	public function delete_article(){

		$article_id = $this->input->post('article_id');

		$this->load->model('articlemodel');
		if ($this->articlemodel->delete_article($article_id)) {
			$this->session->set_flashdata('feedback','article deleted');
			$this->session->set_flashdata('feedback_class','alert-success');
		} else{
			$this->session->set_flashdata('feedback','failed to delete');
			$this->session->set_flashdata('feedback_class','alert-danger');
		}

		return redirect('articles/dashboard');

	}


	



	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('admin_id')) {
			return redirect('admin/login');
		}
	}



}