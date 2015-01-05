<div class="span12">
<a href="<?php echo site_url();?>add-slide" class="btn btn-success pull-right">Add Slide</a>
</div>
<div class="span12">
<?php
		
		$result = '';
		
		//if users exist display them
		if ($query->num_rows() > 0)
		{
			$count = $page;
			
			$result .= 
			'
				<table class="table table-hover table-bordered table-responsive">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Image</th>
					  <th>Slide Title</th>
					  <th>Date Created</th>
					  <th>Status</th>
					  <th colspan="5">Actions</th>
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
				$slide_id = $row->slide_id;
				$slide_name = $row->slide_name;
				$slide_description = $row->slide_description;
				$slide_status = $row->slide_status;
				$image = $row->slide_image;
				$created_by = $row->created_by;
				$modified_by = $row->modified_by;
				$comments = $this->users_model->count_items('post_comment', 'slide_id = '.$slide_id);
				
				//status
				if($slide_status == 1)
				{
					$status = 'Active';
				}
				else
				{
					$status = 'Disabled';
				}
				
				//create deactivated status display
				if($slide_status == 0)
				{
					$status = '<span class="label label-important">Deactivated</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'activate-post/'.$slide_id.'" onclick="return confirm(\'Do you want to activate '.$slide_description.'?\');">Activate</a>';
				}
				//create activated status display
				else if($slide_status == 1)
				{
					$status = '<span class="label label-success">Active</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'deactivate-post/'.$slide_id.'" onclick="return confirm(\'Do you want to deactivate '.$slide_description.'?\');">Deactivate</a>';
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
						<td><img src="'.base_url()."assets/images/slider/thumbnail_".$image.'"></td>
						<td>'.$slide_name.'</td>
						<td>'.$slide_description.'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->created_on)).'</td>
						<td>'.$status.'</td>
						<td><a href="'.site_url().'edit-slide/'.$slide_id.'" class="btn btn-sm btn-success">Edit</a></td>
						<td>'.$button.'</td>
						<td><a href="'.site_url().'delete-slide/'.$slide_id.'" class="btn btn-sm btn-danger" onclick="return confirm(\'Do you really want to delete '.$slide_description.'? This will also delete all comments associated with this post\');">Delete</a></td>
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
			$result .= "There are no posts";
		}
		
		echo $result;
?>
<br>
</div>