
<div id="footer" class="full-width footer">
    <div class="container">
        <div class="row">
            <div class=" col-md-3">
                <div class="widget">
                    <h2 class="widget-title">About us</h2>
                    <!-- <h2 class="widget-title"><a href=""><img src="<?php echo base_url();?>assets/themes/realta/img/logo-realta-cropped.png" alt="First National | Real Estate"/></a></h2> -->
                    <p>A father and son real estate team that gives back to the community.<br>
                        They are proud sponsors of many local clubs and charities.<br>
                        Part of the Walsh & Sullivan group they bring a combination of experience, knowledge and integrity.
                        </p>
                </div>
            </div>
            <div class=" col-md-3">
                <div class="widget">
                    <h2 class="widget-title">Our address</h2>
                    <ul class="fa-ul-icons">
                        <li><i class="fa fa-location-arrow"></i><span class="overflowed">12 Old Northern Road, Baulkham Hills </span></li>
                        <li><i class="fa fa-phone"></i><a href="tel:0414072084">Call us: 0414 072 084</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="mailto:s.haggarty@walshsullivan.com.au">s.haggarty@walshsullivan.com.au</a></li>
                    </ul>
                </div>
            </div>
             <div class=" col-md-4">
                <div class="widget">
                    <h2 class="widget-title">Newsletter</h2>
                    <?php echo form_open("request-news-letter", array("class" => "form-horizontal"));?>
                      
                        <div class="col-sm-6 af-outer af-required">
                            <div class="form-group af-inner">
                                <input type="text" name="first_name" id="first_name" size="30" value="" placeholder="First name *" class="form-control placeholder" />
                                <label class="error" for="first_name" id="firstname_error">Name.</label>
                            </div>
                        </div>
                        <div class="col-sm-6 af-outer af-required">
                            <div class="form-group af-inner">
                                <input type="text" name="last_name" id="last_name" size="30" value="" placeholder="Last name *" class="form-control placeholder" />
                                <label class="error" for="last_name" id="lastname_error">Last Name.</label>
                            </div>
                        </div>
                        <div class="col-sm-12 af-outer af-required">
                            <div class="form-group af-inner">
                                <input type="text" name="email_address" id="email_address" size="30" value="" placeholder="Email *" class="form-control placeholder" />
                                <label class="error" for="email_address" id="email_error">Email is required.</label>
                            </div>
                        </div>
                        <div class="col-sm-12 af-outer af-required">
                            <div class="form-group af-inner text-center">
                                <input type="submit" name="submit" class="form-button btn btn-success" size="30" id="submit_btn" value="Subscribe" />
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
            <div class=" col-md-2">
                <div class="widget">
                    <div class="col-sm-12 text-center"> 
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <a href="#top" class="form-button btn btn-success col-sm-12 cd-top"> <i class="fa fa-angle-up"></i>back to top</a>
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="full-width footer-line">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright">&copy; Copyright First National | Your Trusted Real Estate Agent <?php echo date('Y');?> | All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/themes/realta/plugins/jquery/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/prettyPhoto/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/superfish/js/superfish.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/themes/realta/plugins/ajax-mail.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/themes/realta/js/main.js"></script>
<script src="<?php echo base_url();?>assets/themes/custom/js/youtube.js"></script>

<script type="text/javascript">
    jQuery(window).load(function() {
        jQuery('#flexslider .flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed: 1500,
            directionNav: true,
            controlNav: false,
            keyboardNav: true
        });
    });
</script>

        
       