          <link href="<?php echo base_url()."assets/themes/jasny/css/jasny-bootstrap.css"?>" rel="stylesheet"/>
          <div class="padd">
            <!-- Adding Errors -->
            <?php
            if(isset($error)){
                echo '<div class="alert alert-danger"> Oh snap! Change a few things up and try submitting again. </div>';
            }
			
			//the blog_category details
			$property_type_id = $property_type[0]->property_type_id;
			$property_type_name = $property_type[0]->property_type_name;
			$property_type_status = $property_type[0]->property_type_status;
            
            $validation_errors = validation_errors();
            
            if(!empty($validation_errors))
            {
				$property_type_name = set_value('property_type_name');
				$property_type_status = set_value('property_type_status');
				
                echo '<div class="alert alert-danger"> Oh snap! '.$validation_errors.' </div>';
            }
			
            ?>
            
            <?php echo form_open_multipart($this->uri->uri_string(), array("class" => "form-horizontal", "role" => "form"));?>
            <!-- blog_category Name -->
            <div class="form-group">
                <label class="col-lg-4 control-label">Property Type Name</label>
                <div class="col-lg-4">
                	<input type="text" class="form-control" name="property_type_name" placeholder="Property type Name" value="<?php echo $property_type_name;?>" required>
                </div>
            </div>
            <!-- Activate checkbox -->
            <div class="form-group">
                <label class="col-lg-4 control-label">Activate Category?</label>
                <div class="col-lg-4">
                    <div class="radio">
                        <label>
                        	<?php
                            if($property_type_status == 1){echo '<input id="optionsRadios1" type="radio" checked value="1" name="property_type_status">';}
							else{echo '<input id="optionsRadios1" type="radio" value="1" name="property_type_status">';}
							?>
                            Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        	<?php
                            if($property_type_status == 0){echo '<input id="optionsRadios1" type="radio" checked value="0" name="property_type_status">';}
							else{echo '<input id="optionsRadios1" type="radio" value="0" name="property_type_status">';}
							?>
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-actions center-align">
                <button class="submit btn btn-primary" type="submit">
                    Edit property name
                </button>
            </div>
            <br />
            <?php echo form_close();?>
		</div>