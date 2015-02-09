
<?php echo $this->load->view('property/property_header', '', TRUE); ?>
<?php echo $this->load->view('home/filter', '', TRUE); ?>
<div class="container container-wrapper gradient projects">

    <!-- // Recent Properties -->
  
    <div class="row">
	    <div class="col-xs-9">
	    	<div class="content-title pull left">
		        <h4><?php echo $title;?></h4>
		    </div>
		    <div class="agent-properties property-list clear">
				<div class="grid">
					<ul class="clear">
					<?php
				    	if($query->num_rows() > 0)
						{
							
							$properties = $query->result();
							
							foreach($properties as $prods)
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
								$property_bathrooms = $prods->property_bathrooms;
								$bedrooms = $prods->bedrooms;
								
								$property_video_id = $prods->property_video_id;

								$property_bathrooms = $prods->bathroom_no;
								$property_bedroom = $prods->bedrooms_no;
								$car_space_no = $prods->car_space;
									
								if(empty($property_video_id))
								{
									$image = '<img src="'.base_url().'/assets/images/property/'.$property_image.'" class="attachment-homeland_property_medium wp-post-image" alt="" style="width: 100%; height: 200px;"/>';
								}
								
								else
								{
									$image = '<div class="youtube" id="'.$property_video_id.'" style="width: 100%; height: 200px;"></div>';
								}

								if($lease_type_id == 1)
								{
									$type = 'rent';
								}
								else
								{
									$type = 'sale';
								}
								?>
								<li id="post-660" class="post-660 homeland_properties type-homeland_properties status-publish has-post-thumbnail hentry clear">
									<div class="row">
										<div class="col-xs-5">
											<div class="property-mask property-image">
																	<figure class="pimage">
																<a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>">
																<!--<img width="330" height="230" src="<?php echo base_url();?>assets/images/property/<?php echo $property_image?>" class="attachment-homeland_property_medium wp-post-image" alt="banner 2">-->					
                                                                <?php echo $image;?>
                                                                </a>
																<figcaption><a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>"><i class="fa fa-link fa-lg"></i></a></figcaption>
																<h4> <a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>" rel="tag">$ <?php echo number_format($property_price,0);?>	</a></h4>	
																<div class="property-price clear">
																	<div class="cat-price">
																		<span class="pcategory"></span>
																		<span class="price">For sale</span>							
																	</div>
																</div>
															</figure>
																	
											</div>
										</div>
										<div class="col-xs-7">
											<div class="agent-property-desc">
												<div class="property-desc">
													<h4><a href=""><?php echo $property_name;?></a></h4><label></label><p>Testimonial:&nbsp;They listened to our needs and kept us well informed.&nbsp; Peacefully set, this renovated full-brick villa has been tastefully updated with easy living in mind. &nbsp;Located within a boutique Over …</p>
											
												</div>
												<div class="property-info-agent">
													<span>
														<i class="fa fa-inbox"></i>
														<?php echo $bedrooms ?> Bedrooms
													</span>				
													<span>
														<i class="fa fa-male"></i>
														<?php echo $property_bathrooms;?> Bathrooms					
													</span>	
													<span>
														<i class="fa-icon-truck"><img src="http://s2.rea.reastatic.net/rs/img/icons/parking_spaces.png$$3000.165-18" alt="Car Spaces"></i>

														<?php echo $property_bathrooms;?> Car spaces					
													</span>		
												</div>
												<div class="agent-info">
													<img alt="" src="http://0.gravatar.com/avatar/40b602e6564375ffd02925dd8a94af99?s=24&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D24&amp;r=G" class="avatar avatar-24 photo" height="24" width="24">			<label><span>Agent:</span> admin</label>
												</div>
												<a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>" class="view-profile">
													View More Details		</a>
											</div>
										</div>
									</div>
								</li>
						<?php
							}
						}

						?>
					</ul>
					<?php

				    if(isset($links))
				    {
				    	echo $links;
				    }

				    ?>
				</div>						
			</div>
	    </div>
	    <div class="col-xs-3">
	    	<?php echo $this->load->view('property/sidebar', '', TRUE); ?>
	    </div>
	 </div>   
</div>