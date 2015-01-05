<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "./application/modules/admin/controllers/admin.php";

class Slider extends admin {
	var $posts_path;
	var $posts_location;

	var $property_path;
	var $property_location;
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('users_model');
		$this->load->model('property_model');
		$this->load->model('file_model');
		$this->load->model('slider_model');
		$this->load->library('image_lib');
		
		//path to image directory
		$this->posts_path = realpath(APPPATH . '../assets/images/posts');
		$this->posts_location = base_url().'assets/images/posts';

		$this->property_path = realpath(APPPATH . '../assets/images/property');
		$this->property_location = base_url().'assets/images/property';
	}

	public function index() 
	{
		$where = 'slide_id > 0';
		$table = 'slider';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'slider';
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = 2;
		$config['per_page'] = 20;
		$config['num_links'] = 5;
		
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_link'] = 'Next';
		$config['next_tag_close'] = '</span>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
		$query = $this->slider_model->get_all_slides($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('slider/slider.php', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<a href="'.site_url().'add-slide" class="btn btn-success pull-right">Add Slide</a>There are no slides';
		}
		$data['title'] = 'All Slides';
		
		$this->load->view('templates/general_admin', $data);
	}
	/*
	*
	*	Add a new post
	*
	*/
	public function add_slide() 
	{
		$this->session->unset_userdata('blog_error_message');
		
		//upload image if it has been selected
		$response = $this->slide_model->upload_blog_image($this->posts_path);
		if($response)
		{
			$v_data['blog_image_location'] = $this->post_location.$this->session->userdata('blog_file_name');
		}
		
		//case of upload error
		else
		{
			$v_data['blog_image_error'] = $this->session->userdata('blog_error_message');
		}
		
		$blog_error = $this->session->userdata('blog_error_message');
		
		//form validation rules
		$this->form_validation->set_rules('blog_category_id', 'Post Category', 'required|xss_clean');
		$this->form_validation->set_rules('created', 'Post Date', 'required|xss_clean');
		$this->form_validation->set_rules('post_title', 'Post Name', 'required|xss_clean');
		$this->form_validation->set_rules('post_status', 'Post Status', 'required|xss_clean');
		$this->form_validation->set_rules('post_content', 'Post Description', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			$file_name = $this->session->userdata('blog_file_name');
			$thumb_name = $this->session->userdata('blog_thumb_name');
			
			if($this->slide_model->add_post($file_name, $thumb_name))
			{
				$this->session->set_userdata('success_message', 'Post added successfully');
				redirect('all-posts');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add post. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add New post';
		$categories_query = $this->slide_model->get_all_active_categories();
		if($categories_query->num_rows > 0)
		{
			$categories = '<select class="form-control" name="blog_category_id">';
			
			foreach($categories_query->result() as $res)
			{
				$categories .= '<option value="'.$res->blog_category_id.'">'.$res->blog_category_name.'</option>';
			}
			$categories .= '</select>';
			
			$v_data['categories'] = $categories;
			$data['content'] = $this->load->view('blog/add_post', $v_data, true);
		}
		
		else
		{
			$data['content'] = 'Please add blog categories to continue. Add categories <a href="'.site_url().'add-blog-category">here</a>';
		}
		$this->load->view('templates/general_admin', $data);
	}

}