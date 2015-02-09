<div class="row">
    <div class="col-lg-12">
     <a href="<?php echo site_url();?>property/all-properties" class="btn btn-primary pull-right">Back to Properties</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
      <style type="text/css">
	  	.add-on{cursor:pointer;}
	  </style>
      <link href="<?php echo base_url()."assets/themes/jasny/css/jasny-bootstrap.css"?>" rel="stylesheet"/>
      <div class="padd">
        <!-- Adding Errors -->
        <?php

        $property_id = $property[0]->property_id;
		$property_name = $property[0]->property_name;
		$property_status = $property[0]->property_status;
		$property_price = $property[0]->property_price;
		$bedrooms_idd = $property[0]->bedrooms;
		$property_size = $property[0]->property_size;
		$land_size = $property[0]->land_size;
		$lease_type_id = $property[0]->lease_type_id;
		$property_description = $property[0]->property_description;
		$property_image = $property[0]->property_image;
		$property_video_id = $property[0]->property_video_id;
		$property_bathrooms = $property[0]->property_bathrooms;
        $car_space_id = $property[0]->car_space_id;
        $actual_date = $property[0]->actual_date;
         $sold_status = $property[0]->sale_status;
        if(isset($error)){
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        
        $validation_errors = validation_errors();
        
        if(!empty($validation_errors))
        {
            echo '<div class="alert alert-danger"> Oh snap! '.$validation_errors.' </div>';
        }
        ?>
        
        <?php echo form_open_multipart($this->uri->uri_string(), array("class" => "form-horizontal", "role" => "form"));?>
        <div class="row">
            <div class="row">
                <div class="col-lg-6">
                <!-- post Name -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Title</label>
                        <div class="col-lg-8">
                        	<input type="text" class="form-control" name="property_name" placeholder="Property Name" value="<?php echo $property_name;?>">
                        </div>
                    </div>
                    <!-- post category -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Type</label>
                        <div class="col-lg-8">
                        	<?php echo $property_types;?>
                        </div>
                    </div>
                    <!-- post category -->
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Location</label>
                        <div class="col-lg-8">
                        	<?php echo $locations;?>
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="col-lg-4 control-label">Property Video ID</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_video_id" placeholder="Property Video ID" value="<?php echo $property_video_id;?>" >
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="col-lg-4 control-label">Property Price</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_price" placeholder="Property Price" value="<?php echo $property_price;?>" >
                        </div>
                    </div>
                     <div class="form-group">
                            <label class="col-lg-4 control-label">Date posted: </label>
                            
                            <div class="col-lg-7">
                                <div id="datetimepicker1" class="input-append">
                                    <input data-format="yyyy-MM-dd" class="form-control" type="text" id="datepicker" name="date_posted" placeholder="<?php echo $actual_date;?>" value="">
                                    <span class="add-on" style="cursor:pointer;">
                                        &nbsp;<i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                        </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Bedrooms</label>
                        <div class="col-lg-7">
                        	<!-- <input type="text" class="form-control" name="property_size" placeholder="Property Bedrooms" value="<?php echo $property_size;?>" > -->
                            <?php
                                $bedrooms_query = $this->property_model->get_all_active_bedrooms();
                                if($bedrooms_query->num_rows > 0)
                                {
                                    $bedrooms = '<select class="form-control" name="bedrooms">';
                                    
                                    foreach($bedrooms_query->result() as $res_bedroom)
                                    {
                                        $bedroom_id = $res_bedroom->bedrooms_id;

                                        if($bedroom_id == $bedrooms_idd)
                                        {
                                            $bedrooms .= '<option value="'.$res_bedroom->bedrooms_id.'" selected>'.$res_bedroom->bedrooms_no.'</option>';
                                        }
                                        else
                                        {
                                            $bedrooms .= '<option value="'.$res_bedroom->bedrooms_id.'">'.$res_bedroom->bedrooms_no.'</option>';
                                        }
                                        
                                    }
                                    $bedrooms .= '</select>';
                                    
                                    
                                }
                                
                                else
                                {
                                    $bedrooms = '<select class="form-control" name="location_id">';
                                    
                                        $bedrooms .= '<option value="0">No bedrooms</option>';
                                    
                                    $bedrooms .= '</select>';
                                }
                                echo $bedrooms;
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Bathrooms</label>
                        <div class="col-lg-7">
                        	<!-- <input type="text" class="form-control" name="property_bathrooms" placeholder="Property Bathrooms" value="<?php echo $property_bathrooms;?>" > -->
                            
                            <?php
                                $bathrooms_query = $this->property_model->get_all_active_bathroom();
                                if($bathrooms_query->num_rows > 0)
                                {
                                    $bathroom_no = '<select class="form-control" name="property_bathrooms">';
                                    
                                    foreach($bathrooms_query->result() as $res)
                                    {
                                         if($res->bathroom_id == $property_bathrooms)
                                        {
                                            $bathroom_no .= '<option value="'.$res->bathroom_id.'" selected>'.$res->bathroom_no.'</option>';
                                        }
                                        else
                                        {
                                            $bathroom_no .= '<option value="'.$res->bathroom_id.'">'.$res->bathroom_no.'</option>';
                                        }
                                    }
                                    $bathroom_no .= '</select>';
                                    
                                    
                                }
                                
                                else
                                {
                                    $bathroom_no = '<select class="form-control" name="bathroom_id">';
                                    
                                        $bathroom_no .= '<option value="0">No bedrooms</option>';
                                    
                                    $bathroom_no .= '</select>';
                                }
                                echo $bathroom_no;
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Car spaces</label>
                        <div class="col-lg-7">
                            <?php
                            $car_spaces_query = $this->property_model->get_all_active_car_spaces();
                            if($car_spaces_query->num_rows > 0)
                            {
                                $car_space_no = '<select class="form-control" name="car_space_id">
                                                <option value="0">Select Car Space</option>';
                                
                                foreach($car_spaces_query->result() as $res)
                                {
                                    if($res->car_space_id == $car_space_id)
                                        {
                                            $car_space_no .= '<option value="'.$res->car_space_id.'" selected>'.$res->car_space.'</option>';
                                        }
                                        else
                                        {
                                            $car_space_no .= '<option value="'.$res->car_space_id.'">'.$res->car_space.'</option>';
                                        }
                                }
                                $car_space_no .= '</select>';
                                
                                
                            }

                            else
                            {
                                $car_space_no = '<select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%" name="bedroom_id">';
                                
                                    $car_space_no .= '<option value="0">No bathroom</option>';
                                
                                $car_space_no .= '</select>';
                            }
                            echo $car_space_no;
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Land Size</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_land_size" placeholder="Property Land Size" value="<?php echo $land_size;?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Sold?</label>
                        <div class="col-lg-7">
                        	<?php
                        	if($sold_status == 2)
                        	{
                        		?>
	                        	 <input type="radio" name="sold_status"  checked value="2"> Yes
	                             <input type="radio" name="sold_status"  value="1"> No
	                             <?php
                        	}
                        	else
                        	{
                        		?>
	                        	 <input type="radio" name="sold_status"   value="2"> Yes
	                             <input type="radio" name="sold_status" checked value="1"> No
	                             <?php
                        	}
                        	?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Activate Property Post?</label>
                        <div class="col-lg-8">
                        <?php
                        if($property_status == 1)
                        {
                        	?>
                        	<input type="radio" name="property_status" checked  value="1"> Yes
                            <input type="radio" name="property_status" value="2"> No
                        	<?php
                        }
                        else
                        {
                        	?>
                        	<input type="radio" name="property_status"   value="1"> Yes
                            <input type="radio" name="property_status" checked value="2"> No
                        	<?php
                        }
                        ?>
                            
                        </div>
                    </div>
                    <!-- Image -->
                   
                    <!-- Activate checkbox -->
                    
                </div>
            </div>
            <div class="row">
                <!-- post content -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">Property description</label>
                    <div class="col-lg-8" style="height:auto;">
                        <textarea class="cleditor" name="property_description" placeholder="Property description"> <?php echo $property_description;?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
            	 <div class="form-group">
                        <label class="col-lg-4 control-label">Post Image</label>
                         <input type="hidden" value="<?php echo $property_image;?>" name="current_image"/>
                        <div class="col-lg-8">
                            
                            <div class="row">
                            
                            	<div class="col-md-8 col-sm-8 col-xs-8">
                                	<div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:150px; height:150px;">
                                             <img src="<?php echo base_url()."assets/images/property/".$property_image;?>">
                                        </div>
                                        <div>
                                            <span class="btn btn-file btn-info"><span class="fileinput-new">Select Image</span><span class="fileinput-exists">Change</span><input type="file" name="post_image" ></span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 
                  
            </div>
           <div class="row">
            <!-- Gallery Images -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gallery Images</label>
                        <div class="col-lg-10">
                            <?php echo form_upload(array( 'name'=>'gallery[]', 'multiple'=>true, 'class'=>'btn'));?>
                            <?php
                            	if($gallery_images->num_rows() > 0)
								{
									$galleries = $gallery_images->result();
									
									foreach($galleries as $gal)
									{
										$thumb = 'thumb_'.$gal->property_image_thumb;
										$product_image_id = $gal->image_id;
										?>
                                        <div class="col-md-4">
                                        	<div class="col-md-12">
                                        		<img src="<?php echo base_url()."assets/images/property/".$thumb;?>"/>
                                        	</div>
                                        	<br>
                                        	<div class="col-md-12">
                                        		<a href="<?php echo base_url()."property/delete_gallery_image/".$product_image_id.'/'.$property_id;?>" class="submit btn btn-danger" >Delete</a>
                                        	</div>
                                        </div>
                                        <?php
									}
								}
							?>
                        </div>
                    </div>
           </div>
            <div class="row">
                <div class="form-actions center-align">
                    <button class="submit btn btn-primary" type="submit">
                      	Edit Property Details
                    </button>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
	</div>
    </div>
</div>