<div class="row">
    <div class="col-lg-12">
     <a href="<?php echo site_url();?>posts" class="btn btn-primary pull-right">Back to posts</a>
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
		$bedrooms = $property[0]->bedrooms;
		$property_size = $property[0]->property_size;
		$land_size = $property[0]->land_size;
		$lease_type_id = $property[0]->lease_type_id;
		$property_description = $property[0]->property_description;
		$property_image = $property[0]->property_image;
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
                        	<input type="text" class="form-control" name="property_name" placeholder="Property Name" value="<?php echo $property_name;?>" required>
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
                </div>
                <div class="col-lg-6">
                	<div class="form-group">
                        <label class="col-lg-4 control-label">Property Price</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_price" placeholder="Property Price" value="<?php echo $property_price;?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Size</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_size" placeholder="Property Name" value="<?php echo $property_size;?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Land Size</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_land_size" placeholder="Property Name" value="<?php echo $land_size;?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Lease type</label>
                        <div class="col-lg-7">
                        	<?php
                        	if($lease_type_id == 1)
                        	{
                        		?>
	                        	 <input type="radio" name="lease_type_id"  checked value="1"> Rental
	                             <input type="radio" name="lease_type_id"  value="2"> Sale
	                             <?php
                        	}
                        	else
                        	{
                        		?>
	                        	 <input type="radio" name="lease_type_id"   value="1"> Rental
	                             <input type="radio" name="lease_type_id" checked value="2"> Sale
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
                      	edit property details
                    </button>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
	</div>
    </div>
</div>