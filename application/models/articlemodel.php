<?php

class Articlemodel extends CI_Model{

	public function get_article($limit, $offset){
		//$limit and $offset(starting number of row) for pagination

		$adminid= $this->session->userdata('admin_id');

		$query= $this->db 	->select()
							//->select('id')
							//->select('title')
							->from('article')
							->limit($limit,$offset)
							->get();

							//->where('user_id',$adminid)
							//->get();
//print_r($query); exit;
		return $query->result();
	}

	public function numrows(){

		$q = $this->db->get('article');

		return $q->num_rows();
	}

	public function post_article($array){
		
		$t=$array['title'];
		$b=$array['body'];
		$u=$array['user_id'];
		$i=$array['image_path'];

		return $this->db->insert('article',['title'=>$t,'body'=>$b,'user_id'=>$u,'image'=>$i] );
		// return $this->db->insert('article',$array);  if form filed names and database names are same
	}

	public function find_article($article_id){

		$q = $this->db 	->select()
						->where('id',$article_id)
						->get('article');

		return $q->row(); 
	}

	public function update_article($article_id,$post){

		$q = $this->db 	->where('id',$article_id)
						->update('article',$post);

		return $q;
	}

	public function delete_article($article_id){

		return $this->db->delete('article',['id'=>$article_id]);

		//OR return $this->db 	->where('id',$article_id)
		//						->delete('article');
	}

	public function get_all_article($limit, $start_of_row)
	//start_of_row = offset
	{
		$q = $this->db 	->select('a.id,a.user_id,a.title,a.body,a.created_at,a.image,u.uname')
						->from('article as a')
						->join('users as u','a.user_id=u.user_id')
						->limit($limit,$start_of_row)
						->order_by('created_at','DESC')
						->get();

		return $q->result();

	}

	public function search_article($search)
	{
		$q = $this->db 	->from('article')
						->like('title',$search)
						//search title field of article table for $search
						->get();

		return $q->result();
	}

	public function view_article($id)
	{
		$q = $this->db 	//->select()
						->select('a.id,a.user_id,a.title,a.body,a.created_at,a.image,u.uname')
						->from('article as a')
						->join('users as u','a.user_id=u.user_id')
						->where('a.id',$id)
						->get();

		return $q->result();
	}

}