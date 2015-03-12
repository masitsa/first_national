<?php

class Blog_model extends CI_Model 
{	
	/*
	*	Retrieve all active categories
	*
	*/
	public function get_all_active_categories()
	{
		$this->db->where('blog_category_status = 1');
		$this->db->order_by('blog_category_name');
		$query = $this->db->get('blog_category');
		
		return $query;
	}
	
	public function get_all_post_categories($blog_category_id)
	{
		$this->db->where('blog_category.blog_category_id = '.$blog_category_id.' OR blog_category.blog_category_parent = '.$blog_category_id);
		$this->db->order_by('blog_category_parent, blog_category_name');
		$query = $this->db->get('blog_category');
		
		return $query;
	}
	
	/*
	*	Retrieve all active categories
	*
	*/
	public function get_all_active_category_parents()
	{
		$this->db->where('blog_category_status = 1 AND blog_category_parent = 0');
		$this->db->order_by('blog_category_order');
		$query = $this->db->get('blog_category');
		
		return $query;
	}
	
	/*
	*	Retrieve all active children
	*
	*/
	public function get_all_active_category_children($blog_category_id)
	{
		$this->db->where('blog_category_status = 1 AND blog_category_parent = '.$blog_category_id);
		$this->db->order_by('blog_category_name');
		$query = $this->db->get('blog_category');
		
		return $query;
	}
	/*
	*	Retrieve all active posts
	*
	*/
	public function all_active_posts()
	{
		$this->db->where('post_status = 1');
		$query = $this->db->get('post');
		
		return $query;
	}
	
	/*
	*	Retrieve latest post
	*
	*/
	public function latest_post()
	{
		$this->db->limit(1);
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('post');
		
		return $query;
	}
	
	/*
	*	Retrieve all posts
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_all_posts($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('post.*, blog_category.blog_category_name');
		$this->db->where($where);
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
	
	/*
	*	Add a new post
	*	@param string $image_name
	*
	*/
	public function add_post($image_name, $thumb_name)
	{
		$data = array(
				'post_title'=>$this->input->post('post_title'),
				'post_status'=>$this->input->post('post_status'),
				'post_content'=>$this->input->post('post_content'),
				'blog_category_id'=>$this->input->post('blog_category_id'),
				'created'=>$this->input->post('created'),
				'created_by'=>$this->session->userdata('user_id'),
				'modified_by'=>$this->session->userdata('user_id'),
				'post_thumb'=>$thumb_name,
				'post_image'=>$image_name
			);
			
		if($this->db->insert('post', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Update an existing post
	*	@param string $image_name
	*	@param int $post_id
	*
	*/
	public function update_post($image_name, $thumb_name, $post_id)
	{
		$data = array(
				'post_title'=>$this->input->post('post_title'),
				'post_status'=>$this->input->post('post_status'),
				'post_content'=>$this->input->post('post_content'),
				'blog_category_id'=>$this->input->post('blog_category_id'),
				'created'=>$this->input->post('created'),
				'modified_by'=>$this->session->userdata('user_id'),
				'post_thumb'=>$thumb_name,
				'post_image'=>$image_name
			);
			
		$this->db->where('post_id', $post_id);
		if($this->db->update('post', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	get a single post's details
	*	@param int $post_id
	*
	*/
	public function get_post($post_id)
	{
		//retrieve all users
		$this->db->from('post');
		$this->db->select('*');
		$this->db->where('post_id = '.$post_id);
		$query = $this->db->get();
		
		return $query;
	}
	
	/*
	*	Delete an existing post's comments
	*	@param int $post_id
	*
	*/
	public function delete_post_comments($post_id)
	{
		if($this->db->delete('post_comment', array('post_id' => $post_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Delete an existing post
	*	@param int $post_id
	*
	*/
	public function delete_post($post_id)
	{
		if($this->db->delete('post', array('post_id' => $post_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Activate a deactivated post
	*	@param int $post_id
	*
	*/
	public function activate_post($post_id)
	{
		$data = array(
				'post_status' => 1
			);
		$this->db->where('post_id', $post_id);
		
		if($this->db->update('post', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Deactivate an activated post
	*	@param int $post_id
	*
	*/
	public function deactivate_post($post_id)
	{
		$data = array(
				'post_status' => 0
			);
		$this->db->where('post_id', $post_id);
		
		if($this->db->update('post', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Retrieve comments
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_comments($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('post.post_title, post.created, post.post_image, post_comment.*');
		$this->db->where($where);
		$this->db->order_by('comment_created', 'DESC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
	
	/*
	*	Add a new comment
	*	@param int $post_id
	*
	*/
	public function add_comment_admin($post_id)
	{
		$data = array(
				'post_comment_description'=>$this->input->post('post_comment_description'),
				'comment_created'=>date('Y-m-d H:i:s'),
				'post_comment_user'=>$this->session->userdata('first_name'),
				'post_comment_email'=>$this->session->userdata('email'),
				'post_id'=>$post_id
			);
			
		if($this->db->insert('post_comment', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Add a new comment
	*	@param int $post_id
	*
	*/
	public function add_comment_user($post_id)
	{
		$data = array(
				'post_comment_description'=>$this->input->post('post_comment_description'),
				'comment_created'=>date('Y-m-d H:i:s'),
				'post_comment_user'=>$this->input->post('name'),
				'post_comment_email'=>$this->input->post('email'),
				'post_comment_status'=>1,
				'post_id'=>$post_id
			);
			
		if($this->db->insert('post_comment', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function get_comment_title($post_id)
	{
		if($post_id > 0)
		{
			$query = $this->get_post($post_id);
			
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$title = $row->post_title;
			}
			
			else
			{
				$title = '';
			}
		}
			
		else
		{
			$title = '';
		}
		
		return $title;	
	}
	
	/*
	*	Delete an existing comment
	*	@param int $post_comment_id
	*
	*/
	public function delete_comment($post_comment_id)
	{
		if($this->db->delete('post_comment', array('post_comment_id' => $post_comment_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Activate a deactivated comment
	*	@param int $post_comment_id
	*
	*/
	public function activate_comment($post_comment_id)
	{
		$data = array(
				'post_comment_status' => 1
			);
		$this->db->where('post_comment_id', $post_comment_id);
		
		if($this->db->update('post_comment', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Deactivate an activated comment
	*	@param int $post_comment_id
	*
	*/
	public function deactivate_comment($post_comment_id)
	{
		$data = array(
				'post_comment_status' => 0
			);
		$this->db->where('post_comment_id', $post_comment_id);
		
		if($this->db->update('post_comment', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function update_views_count($post_id)
	{
		//get count of views
		$this->db->where('post_id', $post_id);
		$query = $this->db->get('post');
		$row = $query->row();
		$total = $row->post_views;
		
		//increment comments
		$total++;
		
		//update
		$data = array(
				'post_views' => $total
			);
		$this->db->where('post_id', $post_id);
		
		if($this->db->update('post', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	/*
	*	Retrieve all categories
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_all_categories($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('blog_category_name', 'ASC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
	
	/*
	*	Add a new category
	*	@param int $post_id
	*
	*/
	public function add_blog_category()
	{
		$data = array(
				'blog_category_name'=>$this->input->post('blog_category_name'),
				'blog_category_status'=>$this->input->post('blog_category_status'),
				'blog_category_parent'=>$this->input->post('blog_category_parent'),
				'created'=>date('Y-m-d H:i:s'),
				'created_by'=>$this->session->userdata('user_id'),
				'modified_by'=>$this->session->userdata('user_id')
			);
			
		if($this->db->insert('blog_category', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Update an existing category
	*	@param int $blog_category_id
	*
	*/
	public function update_blog_category($blog_category_id)
	{
		$data = array(
				'blog_category_name'=>$this->input->post('blog_category_name'),
				'blog_category_status'=>$this->input->post('blog_category_status'),
				'blog_category_parent'=>$this->input->post('blog_category_parent'),
				'modified_by'=>$this->session->userdata('user_id')
			);
			
		$this->db->where('blog_category_id', $blog_category_id);
		if($this->db->update('blog_category', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	get a single category's details
	*	@param int $blog_category_id
	*
	*/
	public function get_blog_category($blog_category_id)
	{
		//retrieve all users
		$this->db->from('blog_category');
		$this->db->select('*');
		$this->db->where('blog_category_id = '.$blog_category_id);
		$query = $this->db->get();
		
		return $query;
	}
	
	/*
	*	Delete an existing post's comments by category id
	*	@param int $blog_category_id
	*
	*/
	public function delete_category_post_comments($blog_category_id)
	{
		$this->db->where(array('blog_category_id' => $blog_category_id));
		$this->db->select('post_id');
		$query = $this->db->get('post');
		
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$post_id = $row->post_id;
			
			if($this->db->delete('post_comment', array('post_id' => $post_id)))
			{
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		else
		{
			return TRUE;
		}
	}
	
	/*
	*	Delete an existing post
	*	@param int $blog_category_id
	*
	*/
	public function delete_category_posts($blog_category_id)
	{
		if($this->db->delete('post', array('blog_category_id' => $blog_category_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Delete an existing category
	*	@param int $blog_category_id
	*
	*/
	public function delete_blog_category($blog_category_id)
	{
		if($this->db->delete('blog_category', array('blog_category_id' => $blog_category_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Activate a deactivated category
	*	@param int $blog_category_id
	*
	*/
	public function activate_blog_category($blog_category_id)
	{
		$data = array(
				'blog_category_status' => 1
			);
		$this->db->where('blog_category_id', $blog_category_id);
		
		if($this->db->update('blog_category', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Deactivate an activated category
	*	@param int $blog_category_id
	*
	*/
	public function deactivate_blog_category($blog_category_id)
	{
		$data = array(
				'blog_category_status' => 0
			);
		$this->db->where('blog_category_id', $blog_category_id);
		
		if($this->db->update('blog_category', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Retrieve recent posts
	*
	*/
	public function get_recent_posts()
	{
		$this->db->from('post');
		$this->db->select('post.*');
		$this->db->where('post_status = 1');
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('', 3);
		
		return $query;
	}
	
	/*
	*	Retrieve popular posts
	*
	*/
	public function get_popular_posts()
	{
		$this->db->from('post');
		$this->db->select('post.*');
		$this->db->where('post_status = 1');
		$this->db->order_by('post_views', 'DESC');
		$query = $this->db->get('', 3);
		
		return $query;
	}
	
	/*
	*	Retrieve related posts
	*
	*/
	public function get_related_posts($blog_category_id, $post_id)
	{
		$this->db->from('post, blog_category');
		$this->db->select('post.*');
		$this->db->where('post.post_id <> '.$post_id.' AND post.post_status = 1 AND post.blog_category_id = blog_category.blog_category_id AND (blog_category.blog_category_id = '.$blog_category_id.' OR blog_category.blog_category_parent = '.$blog_category_id.')');
		$this->db->order_by('post.created', 'DESC');
		$query = $this->db->get('', 4);
		
		return $query;
	}
	
	/*
	*	Retrieve comments
	* 	@param int $post_id
	*
	*/
	public function get_post_comments($post_id)
	{
		//retrieve all users
		$this->db->from('post_comment');
		$this->db->select('post_comment.*');
		$this->db->where('post_comment_status = 1 AND post_id = '.$post_id);
		$this->db->order_by('comment_created', 'DESC');
		$query = $this->db->get();
		
		return $query;
	}
	public function upload_blog_image($blog_path)
	{
		//upload product's gallery images
		$resize['width'] = 1000;
		$resize['height'] = 430;
		
		if(isset($_FILES['post_image']['tmp_name']))
		{
			$file_name = $this->session->userdata('blog_file_name');
			if(!empty($file_name))
			{
				//delete any other uploaded image
				$this->file_model->delete_file($blog_path."\\".$this->session->userdata('blog_file_name'));
				
				//delete any other uploaded thumbnail
				$this->file_model->delete_file($blog_path."\\thumbnail_".$this->session->userdata('blog_file_name'));
			}
			//Upload image
			$response = $this->file_model->upload_file($blog_path, 'post_image', $resize);
			if($response['check'])
			{
				$file_name = $response['file_name'];
				$thumb_name = $response['thumb_name'];
				
				//crop file to 1920 by 1010
				$response_crop = $this->file_model->crop_file($blog_path."\\".$file_name, $resize['width'], $resize['height']);
				
				if(!$response_crop)
				{
					$this->session->set_userdata('blog_error_message', $response_crop);
				
					return FALSE;
				}
				
				else
				{	
					//Set sessions for the image details
					$this->session->set_userdata('blog_file_name', $file_name);
					$this->session->set_userdata('blog_thumb_name', $thumb_name);
				
					return TRUE;
				}
			}
		
			else
			{
				$this->session->set_userdata('blog_error_message', $response['error']);
				
				return FALSE;
			}
		}
		
		else
		{
			$this->session->set_userdata('blog_error_message', '');
			return FALSE;
		}
	}
	
	/*
	*	Retrieve latest comments
	*
	*/
	public function get_latest_comments()
	{
		//retrieve alatest comments
		$this->db->from('post_comment');
		$this->db->select('post_comment.*');
		$this->db->where('post_comment_status = 1');
		$this->db->limit(10);
		$this->db->order_by('comment_created', 'DESC');
		$query = $this->db->get();
		
		return $query;
	}
}
?>