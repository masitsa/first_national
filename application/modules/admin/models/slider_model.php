<?php

class Slider_model extends CI_Model 
{	
	

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
	*	Retrieve all posts
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_all_slides($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('slider.*');
		$this->db->where($where);
		$this->db->order_by('created_on', 'DESC');
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
				'post_title'=>ucwords(strtolower($this->input->post('post_title'))),
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
				'post_title'=>ucwords(strtolower($this->input->post('post_title'))),
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
}
?>