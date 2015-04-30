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
		$property_video_id = $prods->property_video_id;
		$sale_status = $prods->sale_status;
		$property_bathrooms = $prods->bathroom_no;
		$property_bedroom = $prods->bedrooms_no;
		$car_space_no = $prods->car_space;
		$actual_date = $prods->actual_date;
		$property_image = $prods->property_image;
		
		$latitude = $prods->latitude;
		$longitude = $prods->longitude;
		
		if(empty($property_video_id))
		{
			$image = '<img src="'.base_url().'/assets/images/property/'.$property_image.'" class="img-responsive"/>';
		}
	
		else
		{
			$image = '<div class="youtube" id="'.$property_video_id.'">
			</div>';
		}
	
		if($sale_status == 2)
		{
			$sale_status = 'Sold';
		}
		else
		{
			$sale_status = 'For Sale';
		}
	}
}

?>

<!-- Slider -->
<?php echo $this->load->view('home/single_header', '', TRUE); ?>

<!-- // filter -->
<?php echo $this->load->view('home/filter', '', TRUE); ?>

<div class="container container-wrapper gradient projects single-project">
    
  	<!-- Property images & map -->
    <div class="row">
    	<div class="col-md-6">
        	<div class="single-property-image">
        		<?php echo $image;?>
            </div>
        </div>
        
    	<div class="col-md-6">
        	<?php
				if($gallery_images->num_rows() > 0)
				{
					$gallery_no = $gallery_images->num_rows();
					?>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
						<?php
						for($r = 0; $r < $gallery_no; $r++)
						{
							if($r == 0)
							{
								$active = 'active';
							}
							else
							{
								$active = '';
							}
							?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $r;?>" class="<?php echo $active;?>"></li>
							<?php
						}
						?>
						</ol>
						
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
					<?php
					$count = 0;
					foreach($gallery_images->result() as $cat)
					{			
						$property_image_name = $cat->property_image_thumb;
						$active = '';
						$count++;
						
						if($count == 1)
						{
							$active = 'active';
						}
						
						echo
						'
							<div class="item '.$active.'">
								<img src="'.base_url().'assets/images/property/'.$property_image_name.'" class="img-responsive">
							</div>
						';
					}
					?>
					</div>
					<?php
					if ($gallery_no > 0)
					{
					?>
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
				</div>
					<?php
					}
				}
			?>
        </div><!-- end images -->
    </div>
  	<!-- End Property images & map -->
	
    <!-- Property header -->
	<div class="row">
    	<div class="col-md-12">
        	<div id="baseInfo" class="stackItem">
                <div id="listing_header">
                    <span class="property_id">
                        
                    </span>
                    <h1 itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress"><?php echo $property_name;?></span>, 
                        
                        <span itemprop="addressLocality"><?php echo $location_name;?></span>
                        
                        <span itemprop="addressRegion">
                        
                        </span>
                        
                        <span itemprop="postalCode">
                        
                        </span>
                    </h1>
                </div>
                
                <div id="listing_info">
                    <ul class="info">
                        <li class="price">
                            <p class="price">
                                <span class="pricePrefix">
                                    Sold for
                                </span>
                                
                                <span class="priceText">
                                    $<?php echo number_format($property_price,2);?>
                                </span>
                            </p>
                        </li>
                    
                        <li class="property_info">
                            <span class="propertyType">
                                <?php echo $property_type_name;?>
                            </span>
                            
                            <ul class="linkList horizontalLinkList propertyFeatures">
                                <li class="first">
                                    <img src="http://s2.rea.reastatic.net/rs/img/icons/beds.png$$3000.165-18" alt="Bedrooms">
                                    <span>
                                        <?php echo $property_bedroom;?>
                                    </span>
                                </li>
                                
                                <li>
                                    <img src="http://s1.rea.reastatic.net/rs/img/icons/baths.png$$3000.165-18" alt="Bathrooms">
                                    <span>
                                        <?php echo $property_bathrooms;?>
                                    </span>
                                </li>
                                
                                <li>
                                    <img src="http://s2.rea.reastatic.net/rs/img/icons/parking_spaces.png$$3000.165-18" alt="Car Spaces">
                                    <span>
                                        <?php echo $car_space_no;?>
                                    </span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="clear"> </div>
            </div>

        </div>
    </div>
  	<!-- End Property header -->
    
    
    <!-- Property description -->
    <div class="row">
    	<div class="col-md-6">
        	<div id="description" class="stackItem">
                
                <p class="body" style="text-align:justify">
                	<?php echo $property_description;?>
                </p>
            </div>
        </div>
        
        <div class="col-md-6">
        	<div id="map_canvas" style="width: 100%; height:400px"></div>
        </div><!-- end map -->
    </div>
    <!-- End Property description -->
  
</div>

<script type="text/javascript"   src="http://maps.google.com/maps/api/js?sensor=false"> </script>

<script type="text/javascript">
$(document).ready(function() {
	initialize()
});
  function initialize() {
    var position = new google.maps.LatLng('<?php echo $latitude ?>', '<?php echo $longitude ?>');
	 <!-- var position = new google.maps.LatLng(latitude, longitude);-->
    var myOptions = {
      zoom: 18,
      center: position,
      //mapTypeId: google.maps.MapTypeId.ROADMAP
	mapTypeId: google.maps.MapTypeId.HYBRID
    };
    var map = new google.maps.Map(
        document.getElementById("map_canvas"),
        myOptions);
 
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"<?php echo $property_type_name;?>"
    });  
 
    var contentString = '<br/><span itemprop="streetAddress"><?php echo $property_name;?></span>, <span itemprop="addressLocality"><?php echo $location_name;?></span>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
       infowindow.open(map,marker);
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
 
  }
 
</script>

<style>
#mainPhoto {
 width: 485px;
  height: 370px;
  background-color:#EEEEEE;
}
.thumbs{
  left: -169px;
  height: 370px;
  background-color: #EEEEEE;	
	}
</style>
</body>