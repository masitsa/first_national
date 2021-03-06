<?php

class Login_model extends CI_Model 
{
	/*
	*	Check if user has logged in
	*
	*/
	public function check_login()
	{
		if($this->session->userdata('login_status'))
		{
			return TRUE;
		}
		
		else
		{
			return FALSE;
		}
	}
	
	/*
	*	Validate a user's login request
	*
	*/
	public function validate_user()
	{
		//select the user by email from the database
		$this->db->select('*');
		$this->db->where(array('email' => $this->input->post('email'), 'activated' => 1, 'password' => md5($this->input->post('password'))));
		$query = $this->db->get('users');
		
		//if users exists
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			//create user's login session
			$newdata = array(
                   'login_status'     => TRUE,
                   'first_name'     => $result[0]->first_name,
                   'email'     => $result[0]->email,
                   'user_id'  => $result[0]->user_id,
                   'user_type_id'  => 3
               );

			$this->session->set_userdata($newdata);
			
			//update user's last login date time
			$this->update_user_login($result[0]->user_id);
			return TRUE;
		}
		
		//if user doesn't exist
		else
		{
			return FALSE;
		}
	}
	
	/*
	*	Update user's last login date
	*
	*/
	private function update_user_login($user_id)
	{
		$data['last_login'] = date('Y-m-d H:i:s');
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
	}
	
	/*
	*	Reset a user's password
	*
	*/
	public function reset_password($user_id)
	{
		$new_password = substr(md5(date('Y-m-d H:i:s')), 0, 6);
		
		$data['password'] = md5($new_password);
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
		
		return $new_password;
	}
	
	// public function get_active_flights()
	// {
	// 	$this->db->select('COUNT(flight_id) AS total_flights');
	// 	$this->db->where('flight_status = 1');
	// 	$query = $this->db->get('flight');
		
	// 	$result = $query->row();
		
	// 	return $result->total_flights;
	// }
	
	// public function get_total_payments()
	// {
	// 	//select the user by email from the database
	// 	$this->db->select('SUM(payment_amount*payment_quantity) AS total_payments');
	// 	$this->db->where('payment_status = 1');
	// 	$this->db->from('payment');
	// 	$query = $this->db->get();
		
	// 	$result = $query->row();
		
	// 	return $result->total_payments;
	// }
	
	public function get_total_appraisals()
	{
		$this->db->select('COUNT(request_id) AS total_appraisals');
		$this->db->where('appraisal_status = 1');
		$query = $this->db->get('appraisal_requests');
		
		$result = $query->row();
		
		return $result->total_appraisals;
	}
	
	public function get_total_comments()
	{
		$this->db->select('COUNT(post_comment_id) AS total_comments');
		$this->db->where('post_comment_status = 1');
		$query = $this->db->get('post_comment');
		
		$result = $query->row();
		
		return $result->total_comments;
	}
	public function get_active_properties()
	{
		$this->db->select('COUNT(property_id) AS total_properties');
		$this->db->where('property_status = 1');
		$query = $this->db->get('property');
		
		$result = $query->row();
		
		return $result->total_properties;
	}
	public function get_active_blogs()
	{
		$this->db->select('COUNT(post_id) AS total_posts');
		$this->db->where('post_status = 1');
		$query = $this->db->get('post');
		
		$result = $query->row();
		
		return $result->total_posts;
	}
}