<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "./application/modules/admin/controllers/admin.php";

class Property extends admin {
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
		
		$this->load->library('image_lib');
		
		//path to image directory
		$this->posts_path = realpath(APPPATH . '../assets/images/posts');
		$this->posts_location = base_url().'assets/images/posts';

		$this->property_path = realpath(APPPATH . '../assets/images/property');
		$this->property_location = base_url().'assets/images/property';
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index() 
	{
		$where = 'property.location_id = location.location_id AND property.property_type_id = property_type.property_type_id';
		$table = 'property, property_type, location ';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'all-properties';
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
		$query = $this->property_model->get_all_properties($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('properties/all_properties', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<a href="'.site_url().'add-property" class="btn btn-success pull-right">Add Property</a>There are no property listins';
		}
		$data['title'] = 'All properties';
		
		$this->load->view('templates/general_admin', $data);
	}

	public function propert_types()
	{
		$where = 'property_type_id > 0';
		$table = 'property_type';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'property/all-property-type';
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
		$query = $this->property_model->get_all_properties_types($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('properties/all_property_types', $v_data, true);
		}
		
		else
		{
			$data['content'] = ' <a href="'.site_url().'property/add-property-type" class="btn btn-success pull-right">Add Property type</a><div style="padding-bottom:10px;">There are no property listings</div>';
		}
		$data['title'] = 'All property types';
		
		$this->load->view('templates/general_admin', $data);
	}





	/*
	*
	*	Add a new post
	*
	*/
	public function add_property_type() 
	{
		$this->session->unset_userdata('property_type_error_message');
		
		//upload image if it has been selected

		
		//form validation rules
		$this->form_validation->set_rules('property_type_name', 'Property type Name', 'required|xss_clean');
		$this->form_validation->set_rules('property_type_status', 'Property Type Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			
			
			if($this->property_model->add_property_type())
			{
				$this->session->set_userdata('success_message', 'Property type added successfully');
				redirect('property/all-property-type');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add New property type';
		$v_data['title'] = 'Add property type';
		$data['content'] = $this->load->view('properties/add_property_type', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}


	/*
	*
	*	Add a new post
	*
	*/
	public function edit_property_type($property_type_id) 
	{
		$this->session->unset_userdata('property_type_error_message');
		
		//upload image if it has been selected

		
		//form validation rules
		$this->form_validation->set_rules('property_type_name', 'Property type Name', 'required|xss_clean');
		$this->form_validation->set_rules('property_type_status', 'Property Type Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			
			
			if($this->property_model->update_property_type($property_type_id))
			{
				$this->session->set_userdata('success_message', 'Property type edited successfully');
				redirect('property/all-property-type');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Edit New property type';
		$v_data['title'] = 'Edit property type';

		$query = $this->property_model->get_property_type($property_type_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['property_type'] = $query->result();
		}
		$data['content'] = $this->load->view('properties/edit_property_type', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}
    

    /*
	*
	*	Delete an existing post
	*	@param int $post_id
	*
	*/
	public function delete_property_type($post_id)
	{
		//delete post image
		// $query = $this->blog_model->get_post($post_id);
		
		// if ($query->num_rows() > 0)
		// {
		// 	$result = $query->result();
		// 	$image = $result[0]->post_image;
			
		// 	$this->load->model('file_model');
		// 	//delete image
		// 	$this->file_model->delete_file($this->posts_path."\\".$image);
		// 	//delete thumbnail
		// 	$this->file_model->delete_file($this->posts_path."\\thumbnail_".$image);
		// }
		// //delete posts of that category
		// $this->blog_model->delete_post_comments($post_id);
		// $this->blog_model->delete_post($post_id);
		// $this->session->set_userdata('success_message', 'Post has been deleted');
		// redirect('all-posts');
	}
    
	/*
	*
	*	Activate an existing post
	*	@param int $post_id
	*
	*/
	public function activate_property_type($property_type_id)
	{
		$this->property_model->activate_property_type($property_type_id);
		$this->session->set_userdata('success_message', 'Property type activated successfully');
		redirect('property/all-property-type');
	}
    
	/*
	*
	*	Deactivate an existing post
	*	@param int $post_id
	*
	*/
	public function deactivate_property_type($property_type_id)
	{
		$this->property_model->deactivate_property_type($property_type_id);
		$this->session->set_userdata('success_message', 'Property type disabled successfully');
		redirect('property/all-property-type');
	}

	////////////////////////////////////////////////////////////////////////////////////////////
	public function locations()
	{
		$where = 'location_id > 0';
		$table = 'location';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'property/all-property-type';
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
		$query = $this->property_model->get_all_locations($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('properties/all_locations', $v_data, true);
		}
		
		else
		{
			$data['content'] = ' <a href="'.site_url().'property/add-location" class="btn btn-success pull-right">Add location</a><div style="padding-bottom:10px;">There are no location listings</div>';
		}
		$data['title'] = 'All locations';
		
		$this->load->view('templates/general_admin', $data);
	}

	/*
	*
	*	Add a new post
	*
	*/
	public function add_location() 
	{
		$this->session->unset_userdata('location_error_message');
		
		//upload image if it has been selected

		
		//form validation rules
		$this->form_validation->set_rules('location_name', 'Property type Name', 'required|xss_clean');
		$this->form_validation->set_rules('location_status', 'Property Type Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			
			
			if($this->property_model->add_location())
			{
				$this->session->set_userdata('success_message', 'Property type added successfully');
				redirect('property/all-location');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add New location';
		$v_data['title'] = 'Add location';
		$data['content'] = $this->load->view('properties/add_location', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}


	/*
	*
	*	Add a new post
	*
	*/
	public function edit_location($location_id) 
	{
		$this->session->unset_userdata('location_error_message');
		
		//upload image if it has been selected

		
		//form validation rules
		$this->form_validation->set_rules('location_name', 'Property type Name', 'required|xss_clean');
		$this->form_validation->set_rules('location_status', 'Property Type Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			
			
			if($this->property_model->update_location($location_id))
			{
				$this->session->set_userdata('success_message', 'Property type edited successfully');
				redirect('property/all-location');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add New location';
		$v_data['title'] = 'Edit location';

		$query = $this->property_model->get_location($location_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['location'] = $query->result();
		}


		$data['content'] = $this->load->view('properties/edit_location', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}
    

    /*
	*
	*	Delete an existing post
	*	@param int $post_id
	*
	*/
	public function delete_location($location_id)
	{
		if($this->property_model->delete_location($location_id))
		{
			$this->session->set_userdata('success_message', 'Location has been deleted');
		}
		
		else
		{
			$this->session->set_userdata('error_message', 'Location could not be deleted');
		}
		
		redirect('property/all-location');
	}
    
	/*
	*
	*	Activate an existing post
	*	@param int $post_id
	*
	*/
	public function activate_location($location_id)
	{
		$this->property_model->activate_location($location_id);
		$this->session->set_userdata('success_message', 'Property type activated successfully');
		redirect('property/all-location');
	}
    
	/*
	*
	*	Deactivate an existing post
	*	@param int $post_id
	*
	*/
	public function deactivate_location($location_id)
	{
		$this->property_model->deactivate_location($location_id);
		$this->session->set_userdata('success_message', 'Property type disabled successfully');
		redirect('property/all-location');
	}
	////////////////////////////////////////////////////////////////////////////////////////////
    

    ////////////////////////////////////////////////////////////////////////////////////////////
	public function properties()
	{
		$where = 'property_id > 0';
		$table = 'property';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'property/properties';
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
		$query = $this->property_model->get_all_properties($table, $where, $config["per_page"], $page);


		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('properties/all_properties', $v_data, true);
		}
		
		else
		{
			$data['content'] = ' <a href="'.site_url().'property/add-property" class="btn btn-success pull-right">Add property</a><div style="padding-bottom:10px;">There are no property listings</div>';
		}
		$data['title'] = 'All properties';
		
		$this->load->view('templates/general_admin', $data);
	}



	

	/*
	*
	*	Add a new post
	*
	*/
	public function add_property() 
	{
		$this->session->unset_userdata('property_error_message');
		
		//upload image if it has been selected

		$this->session->unset_userdata('property_error_message');
		
		//upload image if it has been selected
		$response = $this->property_model->upload_property_image($this->property_path);
		if($response)
		{
			//$v_data['blog_image_location'] = $this->post_location.$this->session->userdata('blog_file_name');
		}
		
		//case of upload error
		else
		{
			$v_data['property_image_error'] = $this->session->userdata('property_error_message');
		}
		
		$property_error = $this->session->userdata('property_error_message');


		//form validation rules
		$this->form_validation->set_rules('property_name', 'Property Name', 'required|xss_clean');
		$this->form_validation->set_rules('property_status', 'Property Status', 'xss_clean');
		$this->form_validation->set_rules('property_video_id', 'Property Video ID', 'trim|xss_clean');
		$this->form_validation->set_rules('location_id', 'Location', 'xss_clean');
		$this->form_validation->set_rules('property_type_id', 'Property Type', 'xss_clean');
		$this->form_validation->set_rules('property_price', 'Property Price', 'trim|xss_clean');
		$this->form_validation->set_rules('property_size', 'Property Size', 'xss_clean');
		$this->form_validation->set_rules('property_land_size', 'Property Land Size', 'xss_clean');
		$this->form_validation->set_rules('lease_type_id', 'Lease Type', 'trim|xss_clean');
		$this->form_validation->set_rules('property_description', 'Property Description', 'trim|xss_clean');
		$this->form_validation->set_rules('property_bathrooms', 'Property Bathrooms', 'numeric|trim|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			$file_name = $this->session->userdata('property_file_name');
			if(!empty($file_name))
			{
				$thumb_name = $this->session->userdata('property_thumb_name');
			}
			
			else{
				$file_name = $this->input->post('current_image');
				$thumb_name = 'thumbnail_'.$this->input->post('current_image');
			}
			$property_id = $this->property_model->add_property($file_name,$thumb_name);
			if($property_id > 0)
			{
				$resize['width'] = 1170;
				$resize['height'] = 423;
				$response = $this->file_model->upload_gallery($property_id, $this->property_path, $resize);
					
				if($response)
				{
					$this->session->set_userdata('success_message', 'Property type added successfully');
					redirect('property/all-properties');
				}
				
				else
				{
					if(isset($response['upload']))
					{
						$this->session->set_userdata('error_message', $error['upload'][0]);
					}
					else if(isset($response['resize']))
					{
						$this->session->set_userdata('error_message', $error['resize'][0]);
					}
					redirect('property/all-properties');
				}
				
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		$property_type_query = $this->property_model->get_all_active_property_type();
		if($property_type_query->num_rows > 0)
		{
			$property_types = '<select class="form-control" name="property_type_id">';
			
			foreach($property_type_query->result() as $res)
			{
				$property_types .= '<option value="'.$res->property_type_id.'">'.$res->property_type_name.'</option>';
			}
			$property_types .= '</select>';
			
			
		}
		
		else
		{
			$property_types = '<select class="form-control" name="property_type_id">';
			
				$property_types .= '<option value="0">No property types</option>';
			
			$property_types .= '</select>';
		}
		
		$location_query = $this->property_model->get_all_active_locations();
		if($location_query->num_rows > 0)
		{
			$locations = '<select class="form-control" name="location_id">';
			
			foreach($location_query->result() as $res_location)
			{
				$locations .= '<option value="'.$res_location->location_id.'">'.$res_location->location_name.'</option>';
			}
			$locations .= '</select>';
			
			
		}
		
		else
		{
			$locations = '<select class="form-control" name="location_id">';
			
				$locations .= '<option value="0">No locations</option>';
			
			$locations .= '</select>';
		}


		$bedrooms_query = $this->property_model->get_all_active_bedrooms();
		if($bedrooms_query->num_rows > 0)
		{
			$bedrooms_no = '<select class="form-control" name="bedroom_id">';
			
			foreach($bedrooms_query->result() as $res)
			{
				$bedrooms_no .= '<option value="'.$res->bedrooms_id.'">'.$res->bedrooms_no.'</option>';
			}
			$bedrooms_no .= '</select>';
			
			
		}
		
		else
		{
			$bedrooms_no = '<select class="form-control" name="bedroom_id">';
			
				$bedrooms_no .= '<option value="0">No bedrooms</option>';
			
			$bedrooms_no .= '</select>';
		}
		
		$bathrooms_query = $this->property_model->get_all_active_bathroom();
		if($bathrooms_query->num_rows > 0)
		{
			$bathroom_no = '<select class="form-control" name="bathroom_id">';
			
			foreach($bathrooms_query->result() as $res)
			{
				$bathroom_no .= '<option value="'.$res->bathroom_id.'">'.$res->bathroom_no.'</option>';
			}
			$bathroom_no .= '</select>';
			
			
		}
		
		else
		{
			$bathroom_no = '<select class="form-control" name="bedroom_id">';
			
				$bathroom_no .= '<option value="0">No bedrooms</option>';
			
			$bathroom_no .= '</select>';
		}
		
		

		//open the add new post
		$data['title'] = 'Add New property';
		$v_data['title'] = 'Add property';
		$v_data['property_types'] = $property_types;
		$v_data['locations'] = $locations;
		$data['content'] = $this->load->view('properties/add_property', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}


	/*
	*
	*	Add a new post
	*
	*/
	public function edit_property($property_id) 
	{
		$this->session->unset_userdata('property_error_message');
		
		//upload image if it has been selected
		$this->session->unset_userdata('property_error_message');
		
		//upload image if it has been selected

		$this->session->unset_userdata('property_error_message');
		
		//upload image if it has been selected
		$response = $this->property_model->upload_property_image($this->property_path);
		if($response)
		{
			//$v_data['blog_image_location'] = $this->post_location.$this->session->userdata('blog_file_name');
		}
		
		//case of upload error
		else
		{
			$v_data['property_image_error'] = $this->session->userdata('property_error_message');
		}
		
		$property_error = $this->session->userdata('property_error_message');
		
		//form validation rules
		$this->form_validation->set_rules('property_name', 'Property Name', 'required|xss_clean');
		$this->form_validation->set_rules('property_status', 'Property Status', 'xss_clean');
		$this->form_validation->set_rules('property_video_id', 'Property Video ID', 'trim|xss_clean');
		$this->form_validation->set_rules('location_id', 'Location', 'xss_clean');
		$this->form_validation->set_rules('property_type_id', 'Property Type', 'xss_clean');
		$this->form_validation->set_rules('property_price', 'Property Price', 'trim|xss_clean');
		$this->form_validation->set_rules('property_size', 'Property Size', 'xss_clean');
		$this->form_validation->set_rules('property_land_size', 'Property Land Size', 'xss_clean');
		$this->form_validation->set_rules('lease_type_id', 'Lease Type', 'trim|xss_clean');
		$this->form_validation->set_rules('property_description', 'Property Description', 'trim|xss_clean');
		$this->form_validation->set_rules('property_bathrooms', 'Property Bathrooms', 'numeric|trim|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			$file_name = $this->session->userdata('property_file_name');
			if(!empty($file_name))
			{
				$thumb_name = $this->session->userdata('property_thumb_name');
			}
			
			else{
				$file_name = $this->input->post('current_image');
				$thumb_name = 'thumbnail_'.$this->input->post('current_image');
			}
			$property_id = $this->property_model->update_property($file_name,$thumb_name,$property_id);
			if($property_id > 0)
			{
				$resize['width'] = 1170;
				$resize['height'] = 423;
				$response = $this->file_model->upload_gallery($property_id, $this->property_path, $resize);
					
				if($response)
				{
					$this->session->set_userdata('success_message', 'Property type added successfully');
					redirect('property/all-properties');
				}
				
				else
				{
					if(isset($response['upload']))
					{
						$this->session->set_userdata('error_message', $error['upload'][0]);
					}
					else if(isset($response['resize']))
					{
						$this->session->set_userdata('error_message', $error['resize'][0]);
					}
					redirect('property/all-properties');
				}
				
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add the property type. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Edit Property';
		$v_data['title'] = 'Edit property';

		$query = $this->property_model->get_property($property_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['property'] = $query->result();
			$rss  = $query->result();
			 $property_type_idd = $rss[0]->property_type_id;
			 $location_idd = $rss[0]->location_id;
			$property_type_query = $this->property_model->get_all_active_property_type();
			if($property_type_query->num_rows > 0)
			{
				$property_types = '<select class="form-control" name="property_type_id">';
				
				foreach($property_type_query->result() as $res)
				{
					$property_type_id = $res->property_type_id;

					if($property_type_id == $property_type_idd)
					{
						$property_types .= '<option value="'.$res->property_type_id.'" selected>'.$res->property_type_name.'</option>';
					}
					else
					{
						$property_types .= '<option value="'.$res->property_type_id.'">'.$res->property_type_name.'</option>';
					}
					
				}
				$property_types .= '</select>';
				
				
			}
			
			else
			{
				$property_types = '<select class="form-control" name="property_type_id">';
				
					$property_types .= '<option value="0">No property types</option>';
				
				$property_types .= '</select>';
			}
			
			$location_query = $this->property_model->get_all_active_locations();
			if($location_query->num_rows > 0)
			{
				$locations = '<select class="form-control" name="location_id">';
				
				foreach($location_query->result() as $res_location)
				{
					$lcoation_id = $res_location->location_id;

					if($lcoation_id == $location_idd)
					{
						$locations .= '<option value="'.$res_location->location_id.'" selected>'.$res_location->location_name.'</option>';
					}
					else
					{
						$locations .= '<option value="'.$res_location->location_id.'">'.$res_location->location_name.'</option>';
					}
					
				}
				$locations .= '</select>';
				
				
			}
			
			else
			{
				$locations = '<select class="form-control" name="location_id">';
				
					$locations .= '<option value="0">No locations</option>';
				
				$locations .= '</select>';
			}
		}
		$v_data['gallery_images'] = $this->property_model->get_gallery_images($property_id);
		$v_data['property_types'] = $property_types;
		$v_data['locations'] = $locations;
		$v_data['property_id'] = $property_id;
		$data['content'] = $this->load->view('properties/edit_property', $v_data, true);
		
		$this->load->view('templates/general_admin', $data);
	}
    

    /*
	*
	*	Delete an existing post
	*	@param int $post_id
	*
	*/
	public function delete_property($post_id)
	{
		//delete post image
		// $query = $this->blog_model->get_post($post_id);
		
		// if ($query->num_rows() > 0)
		// {
		// 	$result = $query->result();
		// 	$image = $result[0]->post_image;
			
		// 	$this->load->model('file_model');
		// 	//delete image
		// 	$this->file_model->delete_file($this->posts_path."\\".$image);
		// 	//delete thumbnail
		// 	$this->file_model->delete_file($this->posts_path."\\thumbnail_".$image);
		// }
		// //delete posts of that category
		// $this->blog_model->delete_post_comments($post_id);
		// $this->blog_model->delete_post($post_id);
		// $this->session->set_userdata('success_message', 'Post has been deleted');
		// redirect('all-posts');
	}
    
	/*
	*
	*	Activate an existing post
	*	@param int $post_id
	*
	*/
	public function activate_property($property_id)
	{
		$this->property_model->activate_property($property_id);
		$this->session->set_userdata('success_message', 'Property type activated successfully');
		redirect('property/all-property');
	}
    
	/*
	*
	*	Deactivate an existing post
	*	@param int $post_id
	*
	*/
	public function deactivate_property($property_id)
	{
		$this->property_model->deactivate_property($property_id);
		$this->session->set_userdata('success_message', 'Property type disabled successfully');
		redirect('property/all-property');
	}
	////////////////////////////////////////////////////////////////////////////////////////////

    
	/*
	*
	*	Edit an existing post
	*	@param int $post_id
	*
	*/
	public function edit_post($post_id) 
	{
		$this->session->unset_userdata('blog_error_message');
		
		//upload image if it has been selected
		$response = $this->blog_model->upload_blog_image($this->posts_path);
		if($response)
		{
			//$v_data['blog_image_location'] = $this->post_location.$this->session->userdata('blog_file_name');
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
		$this->form_validation->set_rules('post_content', 'Post Name', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{

			$file_name = $this->session->userdata('blog_file_name');
			if(!empty($file_name))
			{
				$thumb_name = $this->session->userdata('blog_thumb_name');
			}
			
			else{
				$file_name = $this->input->post('current_image');
				$thumb_name = 'thumbnail_'.$this->input->post('current_image');
			}
			//update post
			if($this->blog_model->update_post($file_name, $thumb_name, $post_id))
			{
				$this->session->set_userdata('success_message', 'Post updated successfully');
				redirect('all-posts');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not update post. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Edit Post';
		
		//select the post from the database
		$query = $this->blog_model->get_post($post_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['post'] = $query->result();
			
			$categories_query = $this->blog_model->get_all_active_categories();
			if($categories_query->num_rows > 0)
			{
				$categories = '<select class="form-control" name="blog_category_id">';
				
				foreach($categories_query->result() as $res)
				{
					if($v_data['post'][0]->blog_category_id == $res->blog_category_id)
					{
						$categories .= '<option value="'.$res->blog_category_id.'" selected="selected">'.$res->blog_category_name.'</option>';
					}
					else
					{
						$categories .= '<option value="'.$res->blog_category_id.'">'.$res->blog_category_name.'</option>';
					}
				}
				$categories .= '</select>';
				
				$v_data['categories'] = $categories;
			
				$data['content'] = $this->load->view('blog/edit_post', $v_data, true);
			}
			
			else
			{
				$data['content'] = 'Please add blog categories to continue. Add categories <a href="'.site_url().'add-blog-category">here</a>';
			}
		}
		
		else
		{
			$data['content'] = 'post does not exist';
		}
		
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Delete an existing post
	*	@param int $post_id
	*
	*/
	public function delete_post($post_id)
	{
		//delete post image
		$query = $this->blog_model->get_post($post_id);
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			$image = $result[0]->post_image;
			
			$this->load->model('file_model');
			//delete image
			$this->file_model->delete_file($this->posts_path."\\".$image);
			//delete thumbnail
			$this->file_model->delete_file($this->posts_path."\\thumbnail_".$image);
		}
		//delete posts of that category
		$this->blog_model->delete_post_comments($post_id);
		$this->blog_model->delete_post($post_id);
		$this->session->set_userdata('success_message', 'Post has been deleted');
		redirect('all-posts');
	}
    
	/*
	*
	*	Activate an existing post
	*	@param int $post_id
	*
	*/
	public function activate_post($post_id)
	{
		$this->blog_model->activate_post($post_id);
		$this->session->set_userdata('success_message', 'Post activated successfully');
		redirect('all-posts');
	}
    
	/*
	*
	*	Deactivate an existing post
	*	@param int $post_id
	*
	*/
	public function deactivate_post($post_id)
	{
		$this->blog_model->deactivate_post($post_id);
		$this->session->set_userdata('success_message', 'Post disabled successfully');
		redirect('all-posts');
	}
    
	/*
	*
	*	Post Comments
	*
	*/
	public function comments($post_id = NULL) 
	{
		$where = 'post.post_id = post_comment.post_id';
		if($post_id == NULL)
		{
			$segment = 2;
		}
		
		else
		{
			$where .= ' AND post_comment.post_id = '.$post_id;
			$segment = 3;
		}
		$table = 'post_comment, post';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'comments/'.$post_id;
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
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
		
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $data["links"] = $this->pagination->create_links();
		$query = $this->blog_model->get_comments($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$v_data['post_id'] = $post_id;
			$v_data['title'] = $this->blog_model->get_comment_title($post_id);
			$data['content'] = $this->load->view('blog/comments', $v_data, true);
		}
		
		else
		{
			if($post_id != NULL)
			{
				$data['content'] = '<a href="'.site_url().'add-comment/'.$post_id.'" class="btn btn-success pull-right">Add Comment</a>There are no comments';
			}
			
			else
			{
				$data['content'] = 'There are no comments';
			}
		}
		$data['title'] = 'Comments';
		
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Add a new comment
	*
	*/
	public function add_comment($post_id) 
	{
		//form validation rules
		$this->form_validation->set_rules('post_comment_description', 'Description', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{	
			if($this->blog_model->add_comment_admin($post_id))
			{
				$this->session->set_userdata('success_message', 'Comment added successfully');
				redirect('comments/'.$post_id);
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add comment. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add Comment';
		$v_data['post_id'] = $post_id;
		$v_data['title'] = $this->blog_model->get_comment_title($post_id);
		$data['content'] = $this->load->view('blog/add_comment', $v_data, true);
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Delete an existing comment
	*	@param int $post_comment_id
	*	@param int $post_id
	*
	*/
	public function delete_comment($post_comment_id, $post_id = NULL)
	{
		$this->blog_model->delete_comment($post_comment_id);
		$this->session->set_userdata('success_message', 'Comment has been deleted');
		redirect('comments/'.$post_id);
	}
    
	/*
	*
	*	Activate an existing comment
	*	@param int $post_comment_id
	*	@param int $post_id
	*
	*/
	public function activate_comment($post_comment_id, $post_id = NULL)
	{
		$this->blog_model->activate_comment($post_comment_id);
		$this->session->set_userdata('success_message', 'Comment activated successfully');
		redirect('comments/'.$post_id);
	}
    
	/*
	*
	*	Deactivate an existing comment
	*	@param int $post_comment_id
	*	@param int $post_id
	*
	*/
	public function deactivate_comment($post_comment_id, $post_id = NULL)
	{
		$this->blog_model->deactivate_comment($post_comment_id);
		$this->session->set_userdata('success_message', 'Comment disabled successfully');
		redirect('comments/'.$post_id);
	}
    
	/*
	*
	*	Blog Categories
	*
	*/
	public function categories() 
	{
		$where = 'blog_category_id > 0';
		$table = 'blog_category';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'blog-categories';
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
		
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
		$query = $this->blog_model->get_all_categories($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$v_data['categories_query'] = $this->blog_model->get_all_active_categories();
			$data['content'] = $this->load->view('blog/all_categories', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<a href="'.site_url().'add-blog-category" class="btn btn-success pull-right">Add Category</a>There are no categories';
		}
		$data['title'] = 'All Categories';
		
		$this->load->view('templates/general_admin', $data);
	}
	
	public function add_blog_category()
	{
		//form validation rules
		$this->form_validation->set_rules('blog_category_parent', 'Parent Category', 'required|xss_clean');
		$this->form_validation->set_rules('blog_category_name', 'Category Name', 'required|xss_clean');
		$this->form_validation->set_rules('blog_category_status', 'Category Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{	
			if($this->blog_model->add_blog_category())
			{
				$this->session->set_userdata('success_message', 'Category added successfully');
				redirect('blog-categories');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add category. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Add Category';
		$categories_query = $this->blog_model->get_all_active_categories();
		$categories = '<select class="form-control" name="blog_category_parent"><option value="0">No Parent</option>';
		if($categories_query->num_rows > 0)
		{
			
			foreach($categories_query->result() as $res)
			{
				$categories .= '<option value="'.$res->blog_category_id.'">'.$res->blog_category_name.'</option>';
			}
		}
		$categories .= '</select>';
		
		$v_data['categories'] = $categories;
		$data['content'] = $this->load->view('blog/add_category', $v_data, true);
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Edit an existing blog category
	*	@param int $blog_category_id
	*
	*/
	public function edit_blog_category($blog_category_id) 
	{
		//form validation rules
		$this->form_validation->set_rules('blog_category_parent', 'Parent Category', 'required|xss_clean');
		$this->form_validation->set_rules('blog_category_name', 'Category Name', 'required|xss_clean');
		$this->form_validation->set_rules('blog_category_status', 'Category Status', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			//update post
			if($this->blog_model->update_blog_category($blog_category_id))
			{
				$this->session->set_userdata('success_message', 'Category updated successfully');
				redirect('blog-categories');
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not update category. Please try again');
			}
		}
		
		//open the add new post
		$data['title'] = 'Edit Category';
		
		//select the post from the database
		$query = $this->blog_model->get_blog_category($blog_category_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['category'] = $query->result();
			$categories_query = $this->blog_model->get_all_active_categories();
			$categories = '<select class="form-control" name="blog_category_parent"><option value="0">No Parent</option>';
			if($categories_query->num_rows > 0)
			{
				
				foreach($categories_query->result() as $res)
				{
					if($v_data['category'][0]->blog_category_parent == $res->blog_category_id)
					{
						$categories .= '<option value="'.$res->blog_category_id.'" selected="selected">'.$res->blog_category_name.'</option>';
					}
					
					else
					{
						$categories .= '<option value="'.$res->blog_category_id.'">'.$res->blog_category_name.'</option>';
					}
				}
			}
			$categories .= '</select>';
			
			$v_data['categories'] = $categories;
			
			$data['content'] = $this->load->view('blog/edit_blog_category', $v_data, true);
		}
		
		else
		{
			$data['content'] = 'post does not exist';
		}
		
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Delete an existing category
	*	@param int $blog_category_id
	*
	*/
	public function delete_blog_category($blog_category_id)
	{
		//delete posts of that category
		$this->blog_model->delete_category_post_comments($blog_category_id);
		$this->blog_model->delete_category_posts($blog_category_id);
		$this->blog_model->delete_blog_category($blog_category_id);
		$this->session->set_userdata('success_message', 'Category has been deleted');
		redirect('blog-categories');
	}
    
	/*
	*
	*	Activate an existing category
	*	@param int $blog_category_id
	*
	*/
	public function activate_blog_category($blog_category_id)
	{
		$this->blog_model->activate_blog_category($blog_category_id);
		$this->session->set_userdata('success_message', 'Category activated successfully');
		redirect('blog-categories');
	}
    
	/*
	*
	*	Deactivate an existing category
	*	@param int $blog_category_id
	*
	*/
	public function deactivate_blog_category($blog_category_id)
	{
		$this->blog_model->deactivate_blog_category($blog_category_id);
		$this->session->set_userdata('success_message', 'Category disabled successfully');
		redirect('blog-categories');
	}
	function add_slide($navigation_id, $sub_navigation_id)
	{
		$_SESSION['navigation_id'] = $navigation_id;
		$_SESSION['sub_navigation_id'] = $sub_navigation_id;
		$data['post_location'] = 'http://placehold.it/300x300';
		
		
		$this->form_validation->set_rules('check', 'check', 'trim|xss_clean');
		$this->form_validation->set_rules('blog_name', 'Title', 'trim|xss_clean');
		$this->form_validation->set_rules('blog_description', 'Description', 'trim|xss_clean');

		if ($this->form_validation->run())
		{	
			if(empty($blog_error))
			{
				$data2 = array(
					'blog_name'=>$this->input->post("blog_name"),
					'blog_description'=>$this->input->post("blog_description"),
					'blog_image_name'=>$this->session->userdata('blog_file_name')
				);
				
				$table = "blog";
				$this->administration_model->insert($table, $data2);
				$this->session->unset_userdata('blog_file_name');
				$this->session->unset_userdata('blog_thumb_name');
				$this->session->unset_userdata('blog_error_message');
				
				redirect('administration/blog/4/5');
			}
		}
		
		$table = "blog";
		$where = "blog_id > 0";
		$items = "*";
		$order = "blog_id";
		
		$data['slides'] = $this->administration_model->select_entries_where($table, $where, $items, $order);
		
		$blog = $this->session->userdata('blog_file_name');
		
		if(!empty($blog))
		{
			$data['post_location'] = $this->post_location.$this->session->userdata('blog_file_name');
		}
		$data['error'] = $blog_error;
		
		$this->load_head();
		$this->load->view("blog/add_slide", $data);
		$this->load_foot();
	}
}
?>