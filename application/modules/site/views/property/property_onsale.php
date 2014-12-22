
<?php echo $this->load->view('property/property_header', '', TRUE); ?>
<?php echo $this->load->view('home/filter', '', TRUE); ?>
<div class="container container-wrapper gradient projects">

    <!-- // Recent Properties -->
   
    <div class="content-title">
        <h2>On-sale Properties</h2>
    </div>
   
    
    <div class="col-xs-9">
    
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
																<img width="330" height="230" src="<?php echo base_url();?>assets/images/property/<?php echo $property_image?>" class="attachment-homeland_property_medium wp-post-image" alt="banner 2">						</a>
															<figcaption><a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>"><i class="fa fa-link fa-lg"></i></a></figcaption>
															<h4> <a href="http://101.0.112.4/~firstnat/firstnational/property-status/sold/" rel="tag">For Sale</a></h4>	
															<div class="property-price clear">
																<div class="cat-price">
																	<span class="pcategory">
																		 <a href="<?php echo base_url();?>properties/view-single/<?php echo $property_id;?>" rel="tag"><?php echo $property_type_name;?></a>								</span>
																											<span class="price">
																				$<?php echo $property_price;?>										</span>							</div>
																<span class="picon"><i class="fa fa-tag"></i></span>
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
															<?php echo $bedrooms;?>						Bedrooms					</span>					<span>
															<i class="fa fa-male"></i>
															<?php echo $property_bathrooms;?> 
															Bathrooms					</span>		</div>
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
    	<div class="sidebar">
	    	<div id="recent-posts-2" class="widget widget_recent_entries">		
	    		<h5>Recent Posts</h5>		
	    		<ul>
					<li>
					<a href="">History Article 2</a>
					</li>
					
				</ul>
			</div>
			<div id="recent-comments-2" class="widget widget_recent_comments">
				<h5>Recent Comments</h5>
				<ul id="recentcomments">
					<li class="recentcomments">
						<a href="" rel="external nofollow" class="url">Mr WordPress</a> on <a href="http://101.0.112.4/~firstnat/firstnational/hello-world/#comment-1">Example Post</a>
					</li>
				</ul>
			</div>
			<div id="archives-2" class="widget widget_archive">
				<h5>Archives</h5>		
				<ul>
					<li><a href="">October 2014</a></li>
					<li><a href="">September 2014</a></li>
					<li><a href="">August 2014</a></li>
				</ul>
			</div>
			<div id="categories-2" class="widget widget_categories"><h5>Categories</h5>		
				<ul>
					<li class="cat-item cat-item-2"><a href="" title="View all posts filed under Articles">Articles</a></li>
					<li class="cat-item cat-item-31"><a href="" title="View all posts filed under History">History</a></li>
					<li class="cat-item cat-item-30"><a href="" title="View all posts filed under Sponsor I Donate I Support">Sponsor I Donate I Support</a></li>
				</ul>
			</div>
		</div>
    </div>
  
  

</div>