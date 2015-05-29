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
            <div class="col-md-6">
                
                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="image">Brochure</label>
                        <div class="col-lg-7" style="height:auto;">
                    		<div class="alert alert-warning">Must be in PDF format</div>
                        	<?php echo form_upload(array( 'name'=>'property_brochure', 'class'=>'btn btn-info'));?>
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
        <?php echo form_close();?>
	</div>
    </div>
</div>