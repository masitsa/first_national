
<?php echo $this->load->view('property/property_header', '', TRUE); ?>
<?php echo $this->load->view('home/filter', '', TRUE); ?>
<div class="container container-wrapper gradient projects">
  <section class="theme-pages">
		<div class="inside clear">
			<div class="theme-fullwidth">
			
		
				<div class="property-list clear">
					<div class="property-three-cols">
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
						<div class="grid cs-style-3 masonry" style="position: relative; width: 1078px; height: 518.8125px;">	
							<ul class="clear">
								<li id="post-666" class="post-666 homeland_properties type-homeland_properties status-publish hentry property-cols masonry-item " style="position: absolute; left: 0px; top: 0px;">
									<div class="property-mask">
										<div class="pimage">
								            <!--<a href="http://101.0.112.4/~firstnat/firstnational/property-item/726-glenrowan-avenue-kellyville/"> <embed height="330px" width="456px"  src="http://www.youtube.com/embed/mDrD_vS_Au4">-->
								    		<div class="fluid-width-video-wrapper" style="">
								    			<?php echo $image;?>
								    		</div>
								                    
														<!--</a>-->
								            <!--<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/726-glenrowan-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
														<h4></h4>-->
												<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/726-glenrowan-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
												<h4> <a href="http://101.0.112.4/~firstnat/firstnational/property-status/sold/" rel="tag">Sold</a></h4>
											<div class="property-price clear">
												<div class="cat-price">
													<span class="pcategory"> <a href="http://101.0.112.4/~firstnat/firstnational/property-type/apartment/" rel="tag">Apartment</a>, <a href="http://101.0.112.4/~firstnat/firstnational/property-type/house/" rel="tag">House</a></span>
													<span class="price">
														$642,000								</span>
												</div>
												<span class="picon"><i class="fa fa-tag"></i></span>
											</div>
										</div>
														
									</div>
									<div class="property-info">
										<span>
											<i class="fa fa-home"></i>
											&nbsp;Sq. Ft		</span>
										<span><i class="fa fa-inbox"></i>3 Bedrooms</span>
										<span><i class="fa fa-male"></i>2 Bathrooms</span>
									</div>
									<div class="property-desc">
										<h4><a href="http://101.0.112.4/~firstnat/firstnational/property-item/726-glenrowan-avenue-kellyville/">7/26 Glenrowan Avenue, Kellyville</a></h4><p>Testimonial: We selected Ian &amp; Scott because we were very impressed with the way they sold our neighbours home. Designed with the modern family in mind, this spacious townhouse makes …</p>
									
									</div>
								</li>
								<li id="post-660" class="post-660 homeland_properties type-homeland_properties status-publish has-post-thumbnail hentry property-cols masonry-item " style="position: absolute; left: 374px; top: 0px;">
									<div class="property-mask">
																<div class="pimage">
								            <!--<a href="http://101.0.112.4/~firstnat/firstnational/property-item/329-hughes-avenue-kellyville/"> <embed height="330px" width="456px"  src="http://www.youtube.com/embed/mDrD_vS_Au4">-->
								                     
								    
								    	<div class="fluid-width-video-wrapper" style=""><iframe src="http://www.youtube.com/embed/mDrD_vS_Au4" id="fitvid176773"> </iframe></div>
								                    
														<!--</a>-->
								            <!--<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/329-hughes-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
														<h4></h4>-->
														<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/329-hughes-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
														<h4> <a href="http://101.0.112.4/~firstnat/firstnational/property-status/sold/" rel="tag">Sold</a></h4>
														<div class="property-price clear">
															<div class="cat-price">
																<span class="pcategory"> <a href="http://101.0.112.4/~firstnat/firstnational/property-type/townhouse/" rel="tag">Townhouse</a></span>
																<span class="price">
																	$440,000								</span>
															</div>
															<span class="picon"><i class="fa fa-tag"></i></span>
														</div>
													</div>
															
									</div>
									<div class="property-info">
										<span>
											<i class="fa fa-home"></i>
											&nbsp;Sq. Ft		</span>
										<span><i class="fa fa-inbox"></i>2 Bedrooms</span>
										<span><i class="fa fa-male"></i>1 Bathrooms</span>
									</div>
									<div class="property-desc">
										<h4><a href="http://101.0.112.4/~firstnat/firstnational/property-item/329-hughes-avenue-kellyville/">3/29 Hughes Avenue, Kellyville</a></h4><p>Testimonial:&nbsp;They listened to our needs and kept us well informed.&nbsp; Peacefully set, this renovated full-brick villa has been tastefully updated with easy living in mind. &nbsp;Located within a boutique Over …</p>
									
									</div>
								</li>
								<li id="post-642" class="post-642 homeland_properties type-homeland_properties status-publish has-post-thumbnail hentry property-cols masonry-item last" style="position: absolute; left: 748px; top: 0px;">
									<div class="property-mask">
																<div class="pimage">
								            <!--<a href="http://101.0.112.4/~firstnat/firstnational/property-item/1926-glenrowan-avenue-kellyville/"> <embed height="330px" width="456px"  src="http://www.youtube.com/embed/mDrD_vS_Au4">-->
								                     
								    
								    	<div class="fluid-width-video-wrapper" style=""><iframe src="http://www.youtube.com/embed/mDrD_vS_Au4" id="fitvid410709"> </iframe></div>
								                    
														<!--</a>-->
								            <!--<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/1926-glenrowan-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
														<h4></h4>-->
														<figcaption><a href="http://101.0.112.4/~firstnat/firstnational/property-item/1926-glenrowan-avenue-kellyville/"><i class="fa fa-link fa-lg"></i></a></figcaption>
														<h4> <a href="http://101.0.112.4/~firstnat/firstnational/property-status/sold/" rel="tag">Sold</a></h4>
														<div class="property-price clear">
															<div class="cat-price">
																<span class="pcategory"> <a href="http://101.0.112.4/~firstnat/firstnational/property-type/townhouse/" rel="tag">Townhouse</a></span>
																<span class="price">
																	$601,000								</span>
															</div>
															<span class="picon"><i class="fa fa-tag"></i></span>
														</div>
													</div>
															
									</div>
									<div class="property-info">
										<span>
											<i class="fa fa-home"></i>
											&nbsp;Sq. Ft		</span>
										<span><i class="fa fa-inbox"></i>3 Bedrooms</span>
										<span><i class="fa fa-male"></i>2 Bathrooms</span>
									</div>
									<div class="property-desc">
										<h4><a href="http://101.0.112.4/~firstnat/firstnational/property-item/1926-glenrowan-avenue-kellyville/">19/26 Glenrowan Avenue, Kellyville</a></h4><p>Testimonial:&nbsp;Proving to be expert negotiators they secured an amount that exceeded our expectations and set a record price for our complex.&nbsp; Located within the coveted Kellyville Village, this spacious townhouse …</p>
									
									</div>
								</li>

							</ul>


						</div>
				<?php
					}
				}
				?>

							


					</div>
				</div>
				<?php

			    if(isset($links))
			    {
			    	echo $links;
			    }

			    ?>
			</div>
		</div>
	</section>
</div>
