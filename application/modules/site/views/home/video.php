 <div class="featured">
        <div class="content-title">
            <h2>Recently sold</h2>
        </div>
        <div class="featured-carousel">
            <div class="featured-control">
                <a href="#" class="featured-prev"><i class="fa fa-angle-left"></i></a>
                <a href="#" class="featured-next"><i class="fa fa-angle-right"></i></a>
            </div>
            <div class="theme-owl-carousel">
                <div class="theme-owl-carousel-wrapper">
                    <div id="featured" class="owl-carousel">
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
								$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 24));
								$price = number_format($property_price, 0, '.', ',');
								$location_name = $prods->location_name;
								$property_size = $prods->property_size;
								$land_size = $prods->land_size;
								$lease_type_id = $prods->lease_type_id;
								$property_type_name = $prods->property_type_name;
								$property_video_id = $prods->property_video_id;
								$property_bathrooms = $prods->bathroom_no;
								$property_bedroom = $prods->bedrooms_no;
								$car_space_no = $prods->car_space;
								
								if(empty($property_video_id))
								{
									$image = '<img src="'.base_url().'/assets/images/property/'.$property_image.'" class="img-responsive property-image" alt="'.$property_name.'"/>
									<div style="clear:both;"></div>';
								}
								
								else
								{
									$image = '<div class="youtube" id="'.$property_video_id.'"></div>';
								}

                                echo '
                                    <div class="thumbnail">
										'.$image.'
                                        
										<div class="hero-block">
						                    <div class="hero-unit text-center">
												<a href="'.base_url().'properties/view-single/'.$property_id.'">  <h5>'.$property_name.', '.$location_name.'</h5> </a>
												
												<div class="row property-info">
													
													
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														<span>
															<i class="fa fa-bed"></i>
															'.$property_bedroom.' 
														</span>
													</div>
													
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														<span>
															<span style="line-height:0.5; float: right;">'.$property_bathrooms.' </span>
															<i class="fa icon-bath"></i>
														</span>
													</div>
													
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														<span>
														
															<i class="fa fa-car"></i>
															'.$car_space_no.' 
														</span>
													</div>
												</div>
												<br/>
						                     <article style="text-align:justfied; max-height:60px;height:60px; overflow:hidden;">'.$mini_desc.'</article><br/>
												<a style="text-align:justfied;" href="'.base_url().'properties/view-single/'.$property_id.'" class="btn btn-large btn-success">More info</a>
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