<?php
    if($property->num_rows() > 0)
    {
        
        $property_rs = $property->result();
        
        foreach($property_rs as $prods)
        {

            $property_id = $prods->property_id;
            $property_name = $prods->property_name;
            $property_status = $prods->property_status;
            $property_price = $prods->property_price;
            $bedrooms = $prods->bedrooms;
            $property_size = $prods->property_size;
            $land_size = $prods->land_size;
            $lease_type_id = $prods->lease_type_id;
            $property_description = $prods->property_description;
            $location_name = $prods->location_name;
            $property_type_name = $prods->property_type_name;
        }
    }

?>

<!-- Slider -->
<?php echo $this->load->view('home/single_header', '', TRUE); ?>

<!-- // filter -->
<?php echo $this->load->view('home/filter', '', TRUE); ?>

<div class="container container-wrapper gradient projects single-project">

<!-- // Single Properties -->

    <div class="content-title">
        <h2><?php echo $property_name;?></h2>
    </div>
    <div class="clear"></div>
    <div class="project-slider">
        <div class="project-type">For Sale</div>
        <div class="caption hidden-xs hidden-sm">
            <p class="price">$ <?php echo $property_price;?></p>
            <ul class="fa-ul">
                <li><i class="fa fa-li fa-location-arrow"></i><?php echo $location_name;?>, NY</li>
                <li><i class="fa fa-li fa-home"></i><?php echo $property_size;?> sqft</li>
                <li><i class="fa fa-li fa-globe"></i><?php echo $land_size;?> acres</li>
            </ul>
        </div>

        <div class="flexslider single">
            <ul class="slides">
                <?php
                if($gallery_images->num_rows() > 0)
                {
                    $galleries = $gallery_images->result();
                  
                    foreach($galleries as $gal)
                    {
                        $thumb = $gal->property_image_thumb;
                        echo $property_image = $gal->property_image;
                        $product_image_id = $gal->image_id;
                        ?>
                        <li data-thumb="<?php echo base_url();?>assets/images/property/<?php echo $thumb?>">
                            <img src="<?php echo base_url();?>assets/images/property/<?php echo $thumb?>" />
                        </li>
                        <?php
                    }
                }
                ?>
               
            </ul>
        </div>

    </div>
    <article>
        <div class="content-title sub-title">
            <h4>Property Description</h4>
        </div>

        <div class="information pull-left">
            <ul>
                <li><i class="fa fa-dollar"></i>6,000</li>
                <li><i class="fa fa-location-arrow"></i>Castile, NY</li>
                <li><i class="fa fa-home"></i>1200 sqft</li>
                <li><i class="fa fa-globe"></i>3 acres</li>
            </ul>
        </div>

        <?php echo $property_description;?>

        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Get Quote</a>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Get Quote</h4>
                    </div>
                    <div class="modal-body">

                        <form name="get-quote" method="post" action="#get-quote" class="af-form row" id="af-form-gq">

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input type="text" name="name" id="name-gq" size="30" value="" placeholder="Name *" class="form-control placeholder" />
                                    <label class="error" for="name-gq" id="name_error_gq">Name is required.</label>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input type="text" name="email" id="email-gq" size="30" value="" placeholder="Email *" class="form-control placeholder" />
                                    <label class="error" for="email-gq" id="email_error_gq">Email is required.</label>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <input type="text" name="phone" id="phone-gq" size="30" value="" placeholder="Phone *" class="form-control placeholder" />
                                    <label class="error" for="phone-gq" id="phone_error_gq">Phone is required.</label>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                                        <option>Apartments</option>
                                        <option>Room</option>
                                        <option>House</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                                        <option>$100-200</option>
                                        <option>$200-500</option>
                                        <option>$500-1000</option>
                                        <option>More than $1000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 af-outer af-required">
                                <div class="form-group af-inner">
                                    <textarea name="message" id="input-message-gq" cols="30" placeholder="Message *" class="form-control placeholder"></textarea>
                                    <label class="error" for="input-message-gq" id="message_error_gq">Message is required.</label>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-success" id="submit_btn_gq">Send Message!</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </article>

</div>
<script type="text/javascript">
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>