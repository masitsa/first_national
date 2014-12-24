<?php echo $this->load->view('contact/contact_header', '', TRUE); ?>
<div class="container container-wrapper gradient top bottom">
    <div class="widget">
        <div class="col-xs-6">
            <h3 class="content-title">Contact Us</h3>
            <form name="contact" method="post" action="#contact" class="af-form row" id="af-form">

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="first_name" id="first_name" size="30" value="" placeholder="First Name" class="form-control placeholder" />
                        <label class="error" for="first_name" id="first_name_error">first name is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="last_name" id="last_name" size="30" value="" placeholder="Last Name" class="form-control placeholder" />
                        <label class="error" for="last_name" id="last_name_error">last name is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="phone_number" id="phone_number" size="30" value="" placeholder="Phone Number" class="form-control placeholder" />
                        <label class="error" for="phone_number" id="phone_number_error">Phone number is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="email" id="email" size="30" value="" placeholder="Email *" class="form-control placeholder" />
                        <label class="error" for="email" id="email_error">Email is required.</label>
                    </div>
                </div>

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <textarea name="message" id="input-message" cols="30" rows="8" placeholder="Message *" class="form-control placeholder"></textarea>
                        <label class="error" for="input-message" id="message_error">Message is required.</label>
                    </div>
                </div>

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="submit" name="submit" class="form-button btn btn-success" id="submit_btn" value="Send Message!" />
                    </div>
                </div>

            </form>
        </div>
        <div class="col-xs-6">
            <h3 class="content-title">Request an appraisal</h3>
            <form name="contact" method="post" action="#contact" class="af-form row" id="af-form">

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="first_name" id="first_name" size="30" value="" placeholder="First Name" class="form-control placeholder" />
                        <label class="error" for="first_name" id="first_name_error">first name is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="last_name" id="last_name" size="30" value="" placeholder="Last Name" class="form-control placeholder" />
                        <label class="error" for="last_name" id="last_name_error">last name is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="phone_number" id="phone_number" size="30" value="" placeholder="Phone Number" class="form-control placeholder" />
                        <label class="error" for="phone_number" id="phone_number_error">Phone number is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="text" name="email" id="email" size="30" value="" placeholder="Email *" class="form-control placeholder" />
                        <label class="error" for="email" id="email_error">Email is required.</label>
                    </div>
                </div>

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <textarea name="address" id="input-address" cols="30" rows="8" placeholder="Address *" class="form-control placeholder"></textarea>
                        <label class="error" for="input-address" id="message_error">Address is required.</label>
                    </div>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                        <option>Select Property Type</option>
                        <option>Condominium Type</option>
                        <option>Condominium Type</option>
                    </select>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                        <option>No of Bed..</option>
                        <option>Condominium Type</option>
                        <option>Condominium Type</option>
                    </select>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                        <option>No of Bathrooms</option>
                        <option>Condominium Type</option>
                        <option>Condominium Type</option>
                    </select>
                </div>
                <div class="col-sm-12 af-outer af-required">
                    <select class="selectpicker show-menu-arrow show-tick" data-live-search="true" data-width="100%">
                        <option>No of Car Spaces</option>
                        <option>Condominium Type</option>
                        <option>Condominium Type</option>
                    </select>
                </div>

                <div class="col-sm-12 af-outer af-required">
                    <div class="form-group af-inner">
                        <input type="submit" name="submit" class="form-button btn btn-success" id="submit_btn" value="Send Message!" />
                    </div>
                </div>

            </form>
        </div>

    </div>
    <!-- // Google Map -->

    <div class="google-maps">
        <!-- <div id="map-canvas"></div> -->
        <iframe width="100px" height="100px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.ke/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Baulkham+Hills,+New+South+Wales,+Australia&amp;aq=0&amp;oq=baul&amp;sll=0.413842,37.903968&amp;sspn=12.411854,21.643066&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Baulkham+Hills+New+South+Wales,+Australia&amp;ll=-33.760672,150.993018&amp;spn=0.161533,0.338173&amp;z=12&amp;output=embed"></iframe><br /><small><a href="https://www.google.co.ke/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Baulkham+Hills,+New+South+Wales,+Australia&amp;aq=0&amp;oq=baul&amp;sll=0.413842,37.903968&amp;sspn=12.411854,21.643066&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Baulkham+Hills+New+South+Wales,+Australia&amp;ll=-33.760672,150.993018&amp;spn=0.161533,0.338173&amp;z=12" style="color:#0000FF;text-align:left">View Larger Map</a></small>
    </div>

    

</div>