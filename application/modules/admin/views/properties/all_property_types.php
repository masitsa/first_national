<?php
		
		$result = '<a href="'.site_url().'property/add-property-type" class="btn btn-success pull-right">Add Property type</a>';
		
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
					  <th>Property type Name</th>
					  <th>Date Created</th>
					  <th>Last Modified</th>
					  <th>Properties</th>
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
				$property_type_id = $row->property_type_id;
				$property_type_name = $row->property_type_name;
				$property_type_status = $row->property_type_status;
				$created_by = $row->created_by;
				$modified_by = $row->last_modified_by;
				$posts = $this->users_model->count_items('property_type', 'property_type_id = '.$property_type_id);
				
				
				//status
				if($property_type_status == 1)
				{
					$status = 'Active';
				}
				else
				{
					$status = 'Disabled';
				}
				
				//create deactivated status display
				if($property_type_status == 0)
				{
					$status = '<span class="label label-important">Deactivated</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'property/activate-property-type/'.$property_type_id.'" onclick="return confirm(\'Do you want to activate '.$property_type_name.'?\');">Activate</a>';
				}
				//create activated status display
				else if($property_type_status == 1)
				{
					$status = '<span class="label label-success">Active</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'property/deactivate-property-type/'.$property_type_id.'" onclick="return confirm(\'Do you want to deactivate '.$property_type_name.'?\');">Deactivate</a>';
				}
				
				//creators & editors
				if($admins != NULL)
				{
					foreach($admins as $adm)
					{
						$user_id = $adm->user_id;
						
						if($user_id == $created_by)
						{
							$created_by = $adm->first_name;
						}
						
						if($user_id == $modified_by)
						{
							$modified_by = $adm->first_name;
						}
					}
				}
				
				else
				{
				}
				$count++;
				$result .= 
				'
					<tr>
						<td>'.$count.'</td>
						<td>'.$property_type_name.'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->created_on)).'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->last_modified_on)).'</td>
						<td>0</td>
						<td>'.$status.'</td>
						<td><a href="'.site_url().'property/edit-property-type/'.$property_type_id.'" class="btn btn-sm btn-success">Edit</a></td>
						<td>'.$button.'</td>
						<td><a href="'.site_url().'property_type/delete-property-type/'.$property_type_id.'" class="btn btn-sm btn-danger" onclick="return confirm(\'Do you really want to delete '.$property_type_name.'? This will delete all posts associated with this category.\');">Delete</a></td>
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
			$result .= "There are no property type";
		}
		
		echo $result;
?>