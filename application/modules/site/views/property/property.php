
<?php echo $this->load->view('property/property_header', '', TRUE); ?>
<?php echo $this->load->view('home/filter', '', TRUE); ?>
<div class="container container-wrapper gradient projects">
  <section class="theme-pages">
			<div class="theme-fullwidth">
			
		
				<div class="property-list ">
					<div class="property-four-cols">
							<div class="grid  masonry" >	
											<ul class="clear">
						<?php
							$x = $query->num_rows();
					    	if($query->num_rows() > 0)
							{
								
								$properties = $query->result();
								$p = 0;
								foreach($properties as $prods)
								{
									$property_price = $prods->property_price;
										$property_image = $prods->property_image;
										$property_id = $prods->property_id;
										$property_name = $prods->property_name;
										$description = $prods->property_description;
										$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 22));
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
											$type = 'sold';
										}
										else
										{
											$type = 'for sale';
										}

								
										?>
									
												<li >
													<div class="property-mask">
														<div class="pimage">
												            <!--<a href="http://101.0.112.4/~firstnat/firstnational/property-item/726-glenrowan-avenue-kellyville/"> <embed height="330px" width="456px"  src="http://www.youtube.com/embed/mDrD_vS_Au4">-->
												    		<div class="fluid-width-video-wrapper" style="">
												    			<?php echo $image;?>
												    		</div>
												                    
																<figcaption><a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>"><i class="fa fa-link fa-lg"></i></a></figcaption>
																<h4> <a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>" rel="tag">$ <?php echo $price;?>	</a></h4>
																<div class="property-price clear">
																	<div class="cat-price">	
																		<span class="price">
																			<?php echo $type;?>
																		</span>
																	</div>
																</div>
														</div>
																		
													</div>
													<div class="property-info">
														<span><i class="fa fa-inbox-custom"></i><?php echo $property_bedroom;?> Bedrooms		</span>
														<span><i class="fa fa-male-custom"></i><?php echo $property_bathrooms;?> Bathrooms</span>
														<span><i class="fa-icon-truck"><img src="http://s2.rea.reastatic.net/rs/img/icons/parking_spaces.png$$3000.165-18" alt="Car Spaces"></i> <?php echo $car_space_no;?> Car space</span>
													</div>
													<div class="property-desc">
														<h4><a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>"><?php echo $property_name;?></a></h4><p><?php echo $mini_desc;?></p>
													
													</div>
												</li>
												


						<?php
								
							}
						}
						?>

											</ul>


									</div>

					</div>

				</div>
				<?php
					    if(isset($links))
					    {
					    	echo $links;
					    }

					    ?>
			</div>
	</section>
</div>
