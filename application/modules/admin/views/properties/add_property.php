<div class="row">
    <div class="col-lg-12">
     <a href="<?php echo site_url();?>posts" class="btn btn-primary pull-right">Back to Properties</a>
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
                        	<input type="text" class="form-control" name="property_name" placeholder="Property Name" value="<?php echo set_value('property_name');?>" required>
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
                        	<input type="text" class="form-control" name="property_video_id" placeholder="Property Video ID" value="<?php echo set_value('property_video_id');?>" >
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="col-lg-4 control-label">Property Price</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="property_price" placeholder="Property Name" value="<?php echo set_value('property_price');?>" >
                        </div>
                    </div>
                     <div class="form-group">
                            <label class="col-lg-4 control-label">Date posted: </label>
                            
                            <div class="col-lg-7">
                                <div id="datetimepicker1" class="input-append">
                                    <input data-format="yyyy-MM-dd" class="form-control" type="text" id="datepicker" name="date_posted" placeholder="Visit Date" value="<?php echo date('Y-m-d');?>">
                                    <span class="add-on" style="cursor:pointer;">
                                        &nbsp;<i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                        </i>
                                    </span>
                                </div>
                            </div>
                     </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="image">Brochure</label>
                        <div class="col-lg-7" style="height:auto;">
                    		<div class="alert alert-warning">Must be in PDF format</div>
                        	<?php echo form_upload(array( 'name'=>'property_brochure', 'class'=>'btn btn-info'));?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="image">Sale contract</label>
                        <div class="col-lg-7" style="height:auto;">
                    		<div class="alert alert-warning">Must be in PDF format</div>
                        	<?php echo form_upload(array( 'name'=>'property_sale_contract', 'class'=>'btn btn-info'));?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Bedrooms</label>
                        <div class="col-lg-7">
                        	
                            <?php echo $bedrooms;?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Bathrooms</label>
                        <div class="col-lg-7">
                            <?php echo $bathrooms;?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Property Bathrooms</label>
                        <div class="col-lg-7">
                            <?php
                            $car_spaces_query = $this->property_model->get_all_active_car_spaces();
                            if($car_spaces_query->num_rows > 0)
                            {
                                $car_space_no = '<select class="form-control" name="car_space_id">
                                                <option value="0">Select Car Space</option>';
                                
                                foreach($car_spaces_query->result() as $res)
                                {
                                    
                                            $car_space_no .= '<option value="'.$res->car_space_id.'">'.$res->car_space.'</option>';
                                        
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
                        	<input type="text" class="form-control" name="property_land_size" placeholder="Property land size" value="<?php echo set_value('property_land_size');?>" >
                        </div>
                    </div>
                    <div class="form-group">
                     <strong class="col-lg-4 control-label" > </strong>  
                       <div class="col-lg-7">
                      <a href="http://www.latlong.net/" target="_blank" class="btn btn-primary" > Click here to search location </a>
                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Longitude</label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="longitude" placeholder="Property Lognitude" value="<?php echo set_value('longitude');?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Latitude </label>
                        <div class="col-lg-7">
                        	<input type="text" class="form-control" name="latitude" placeholder="Property Latitude" value="<?php echo set_value('latitude');?>" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Sold?</label>
                        <div class="col-lg-7">
                        	 <input type="radio" name="lease_type_id" checked  value="1"> Yes
                             <input type="radio" name="lease_type_id" value="2"> No
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Activate Property Post?</label>
                        <div class="col-lg-8">
                            <input type="radio" name="property_status" checked  value="1"> Yes
                            <input type="radio" name="property_status" value="1"> No
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
                        <textarea class="cleditor" name="property_description" placeholder="Property description"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- post content -->
                <div class="form-group">
                    <label class="col-lg-2 control-label">Inspection times</label>
                    <div class="col-lg-8" style="height:auto;">
                        <textarea class="cleditor" name="property_inspection_time" placeholder="Inspection times"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-6">
            	 <div class="form-group">
                        <label class="col-lg-4 control-label">Post Image</label>
                        <div class="col-lg-8">
                            
                            <div class="row">
                            
                            	<div class="col-md-8 col-sm-8 col-xs-8">
                                	<div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:150px; height:150px;">
                                            <img src="http://placehold.it/150x150">
                                        </div>
                                        <div>
                                            <span class="btn btn-file btn-info"><span class="fileinput-new">Select Image</span><span class="fileinput-exists">Change</span><input type="file" name="post_image"></span>
                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                  		<div class="form-group">
		                   <label class="col-lg-2 control-label" for="image">Gallery Images</label>
		                   <div class="col-lg-8" style="height:auto;">
		                       <?php echo form_upload(array( 'name'=>'gallery[]', 'multiple'=>true, 'class'=>'btn'));?>
		                   </div>
		               </div>
                  </div>
            </div>
           
            <div class="row">
                <div class="form-actions center-align">
                    <button class="submit btn btn-primary" type="submit">
                        Add New Property
                    </button>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
	</div>
    </div>
</div>