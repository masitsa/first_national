<?php
		
		$result = '';
		
		//if users exist display them
		$count = 0;
		if ($query->num_rows() > 0)
		{
			
			
			$result .= 
			'
				<table class="table table-hover table-bordered table-responsive" 
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Full Names</th>
					  <th>Email</th>
					  <th>Phone Number</th>
					  <th>Requested on</th>
					  <th>Appraisal Details</th>
					  <th>Status</th>
					  <th colspan="3">Actions</th>
					</tr>
				  </thead>
				  <tbody>
			';
			
			//get all administrators
			$administrators = $this->users_model->get_all_administrators();
			if ($administrators->num_rows() > 0)
			{
				$admins = $administrators->result();
			}
			
			else
			{
				$admins = NULL;
			}
			
			foreach ($query->result() as $row)
			{
				$request_id = $row->request_id;
				$first_name = $row->first_name;
				$appraisal_status = $row->appraisal_status;
				$last_name = $row->last_name;
				$property_type_name = $row->property_type_name;
				$car_space = $row->car_space;
				$bedrooms_no = $row->bedrooms_no;
				$bathroom_no = $row->bathroom_no;
				$created_on = $row->created_on;
				$phone_number = $row->phone_number;
				$email_address = $row->email_address;
				
				$appraisal_details = '<span class="label label-success">Property Type : '.$property_type_name.' <br> Bedroom (s): '.$bedrooms_no.' <br> Bathroom(s): '.$bathroom_no.' <br> Cars Space(s) : '.$car_space.' </span>';
				
				//status
				if($appraisal_status == 1)
				{
					$status = 'Active';
				}
				else
				{
					$status = 'Disabled';
				}
				
				//create deactivated status display
				if($appraisal_status == 1)
				{
					$status = '<span class="label label-important">Not marked</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'property/activate-property/'.$request_id.'" onclick="return confirm(\'Do you want to activate '.$first_name.'?\');">Mark as seen</a>';
				}
				//create activated status display
				else if($appraisal_status > 1)
				{
					$status = '<span class="label label-success">Seen</span>';
				}
				
				
				$count++;
				$result .= 
				'
					<tr>
						<td>'.$count.'</td>
						<td>'.$first_name.' '.$last_name.'</td>
						<td>'.$email_address.'</td>
						<td>'.$phone_number.'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->created_on)).'</td>
						<td>'.$appraisal_details.'</td>
						<td>'.$status.'</td>
						<td>'.$button.'</td>
						<td><a href="'.site_url().'property/delete-property/'.$request_id.'" class="btn btn-sm btn-danger" onclick="return confirm(\'Do you really want to delete '.$first_name.'? This will delete all posts associated with this category.\');">Delete</a></td>
					</tr> 
				';
			}
			
			$result .= 
			'
						  </tbody>
						</table>
			';
		}
		
		else
		{
			$result .= "There are no appraisals  ";
		}
		
		echo $result;
?>