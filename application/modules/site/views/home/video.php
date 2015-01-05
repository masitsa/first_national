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
								$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 20));
								$price = number_format($property_price, 0, '.', ',');
								$location_name = $prods->location_name;
								$property_size = $prods->property_size;
								$land_size = $prods->land_size;
								$lease_type_id = $prods->lease_type_id;
								$property_type_name = $prods->property_type_name;
								$property_video_id = $prods->property_video_id;
								$property_bathrooms = $prods->property_bathrooms;
								
								if(empty($property_video_id))
								{
									$image = '<img src="'.base_url().'/assets/images/property/'.$property_image.'" class="img-responsive" alt="" style="width: 100%; height: 200px;"/>';
								}
								
								else
								{
									$image = '<div class="youtube" id="'.$property_video_id.'" style="width: 100%; height: 200px;"></div>';
								}

                                echo '
                                    <div class="thumbnail" style="">
										'.$image.'
                                        
										<div class="hero-block">
						                    <div class="hero-unit text-center">
						                        <h5>'.$property_name.'</h5>
												
												<div class="row property-info">
													
													
													<div class="col-md-6">
														<span>
															<i class="fa fa-inbox-custom"></i>
															'.$property_size.' Bedrooms
														</span>
													</div>
													
													<div class="col-md-6">
														<span>
															<i class="fa fa-male-custom"></i>
															'.$property_bathrooms.' Bathrooms
														</span>
													</div>
												</div>
												
						                        <p>'.$mini_desc.'…</p>
						                         <a href="'.base_url().'properties/view-single/'.$property_id.'" class="btn btn-large btn-success">More info</a>
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