 <div class="featured">
        <div class="content-title">
            <h2>Featured Properties</h2>
        </div>
        <div class="featured-carousel">
            <div class="featured-control">
                <a href="#" class="featured-prev"><i class="fa fa-angle-left"></i></a>
                <a href="#" class="featured-next"><i class="fa fa-angle-right"></i></a>
            </div>
            <div class="theme-owl-carousel">
                <div class="theme-owl-carousel-wrapper" style"height:150px;">
                    <div id="featured" class="owl-carousel" style"width: 374px;height:150px;">
                     <?php
				    	if($latest->num_rows() > 0)
						{
							
							$lates_properties = $latest->result();
							
							foreach($lates_properties as $prods)
							{
								$property_price = $prods->property_price;
								$property_image = $prods->property_image;
								$property_id = $prods->property_id;
								$property_name = $prods->property_name;
								$description = $prods->property_description;
								$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
								$price = number_format($property_price, 0, '.', ',');
								$location_name = $prods->location_name;
								$property_size = $prods->property_size;
								$land_size = $prods->land_size;
								$lease_type_id = $prods->lease_type_id;
								$property_type_name = $prods->property_type_name;

                                echo '
                                    <div class="thumbnail" style="height: 450px; ">
                                        <a href="#"><iframe width="100%" height="66.8%" src="//www.youtube.com/embed/sjQShSoR7e4" frameborder="0" allowfullscreen></iframe></a>
                                        <div class="hero-block">
						                    <div class="hero-unit text-center">
						                        <h5 style="color: #384042;font-size:18px; font-family: Roboto, sans-serif;">Meet The Team</h5>
						                        <p>With over 45 years combined experience. Wisely they listen to their clients needs.</p>
						                         <p><a href="#" class="btn btn-large btn-success">Read More</a></p>
						                    </div>
						                </div>
                                       
                                    </div>
                                      
                                    ';
                            }
                        }
                        ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>