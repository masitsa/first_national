<?php
if($property->
num_rows() >
0)
{

$property_rs = $property->
result();

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

if(empty($property_video_id))
{
$image = '
<img src="'.base_url().'/assets/images/property/'.$property_image.'" class="attachment-homeland_property_medium wp-post-image" alt="" style="width: 100%; height: 200px;"/>
';
}

else
{
$image = '
<div class="youtube" id="'.$property_video_id.'" style="width: 100%; height: 200px;">
</div>
';
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
  
  <!-- // Single Properties -->
  <div class="col-sm-12 col-md-12 col-xs-12" >
    <div id="" class="">
      <div id="baseInfo" class="stackItem">
        <div id="listing_header">
          <span class="property_id">
            Property No. 118376283
          </span>
          <h1 itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
            <span itemprop="streetAddress">
             	<?php echo $property_name;?>
            </span>
            
            <span itemprop="addressLocality">
              <?php echo $location_name;?>
            </span>
            
            <span itemprop="addressRegion">
              
            </span>
            
            <span itemprop="postalCode">
              
            </span>
          </h1>
        </div>
        
       <!--  <div id="listing_links">
          <ul class="links">
            <li class="page_visits">
              <a href="/pdpvisits.ds?id=118376283&amp;theme=rea.sold" rel="visits" class="interesting">
                Show Page Visits
              </a>
            </li>
            
            <li class="mortgage_calculator">
              <a id="calculator_anchor" href="#_" class="interesting">
                Mortgage Calculator
              </a>
            </li>
          </ul>
        </div> -->
        
        <div id="listing_info">
          <ul class="info">
            <li class="price">
              <p class="price">
                <span class="pricePrefix">
                  Sold for
                </span>
                
                <span class="priceText">
                  $ <?php echo number_format($property_price,0);?>
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
        
        <div id="listing_info_secondary">
          <div class="sold_date">
            <strong>
              Sold Date:
            </strong>
            
            <span>
             	<?php echo $actual_date;?>
            </span>
          </div>
          
        
        </div>
        
        <div class="clear"> </div>
      </div>
  <div class="col-sm-8 col-md-8 col-xs-8" >
      <div id="photoViewer" class="stackItem">
        <div id="photoViewerCont">
          <div id="mainPhoto" class="preview">
            <div class="innerCont" style="width:456px;line-height: 342px;">
              <a href="/photogallery_new.ds?id=118376283&amp;theme=rea.sold" data-id="118376283" rel="photos" onclick="return false;">
                <img src="http://i1.au.reastatic.net/456x342/39f9c1320d1af4b9f5063e0547ca51fe09a4af4d58dfe1a8ac970ade7be38930/main.jpg" style="max-width:456px;max-height:342px" data-index="0" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill">
                <img src="http://s1.rea.reastatic.net/rs/img/photoviewer/enlarge.png$$3000.165-18" class="hoverOverlay" alt="">
              </a>
            </div>
          </div>
          
          <div class="thumbs">
            <div class="innerCont">
              <div class="paginated">
                <div class="pages" style="height: 936px;">
                  <div class="page">
                    <div class="thumb activeThumb">
                      <img class="thumb_0" src="http://i2.au.reastatic.net/120x90/39f9c1320d1af4b9f5063e0547ca51fe09a4af4d58dfe1a8ac970ade7be38930/main.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="main_photo">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_1" src="http://img.youtube.com/vi/QT0Yn9vMhFE/0.jpg" width="120" height="90" alt="" title="" data-type="youtube_preview">
                      <img src="http://s1.rea.reastatic.net/rs/img/mediaviewer_v3/off.png$$3000.165-18" class="playButton">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_2" src="http://i3.au.reastatic.net/120x90/77b5d08dce6c75c74aed13a5b9fb107a8db8e0cd8e9636cf72f4f576d3ea1383/image2.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="clearer">
                    </div>
                  </div>
                  
                  <div class="page">
                    <div class="thumb">
                      <img class="thumb_3" src="http://i4.au.reastatic.net/120x90/fe483fa5ddfab1fac727c0c938337c95ff4684c363cc019812a853bc0f14f988/image3.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_4" src="http://i1.au.reastatic.net/120x90/fe80b87672fc6b4bdff70a46d9fd70c70f29cd1596a5511037ddd342f370d198/image4.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_5" src="http://i2.au.reastatic.net/120x90/f920b6fca5c9dcc4b2a9b4d8449ad268ee23eda8a6491d8562cda9bdbeedd2b4/image5.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="clearer">
                    </div>
                  </div>
                  
                  <div class="page">
                    <div class="thumb">
                      <img class="thumb_6" src="http://i3.au.reastatic.net/120x90/2464caacfe9b2dafc4cb74d8a4d9700a509f00b7dd5eba47cd61d10e73a31f5c/image6.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_7" src="http://i4.au.reastatic.net/120x90/94fb5b31b05b792b2a70e32043ef0df4b01ea22e0a625ef33128b8c723a8f05e/image7.jpg" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="photo">
                    </div>
                    
                    <div class="thumb">
                      <img class="thumb_8" src="http://i1.au.reastatic.net/120x90/eb1d0146377448569654ee90783f9f7e71336e2e47c41321366d61a3ed8acb21/floorplan1.gif" width="120" height="90" alt="14 Fiona Ave, Castle Hill" title="14 Fiona Ave, Castle Hill" data-type="floorplan">
                    </div>
                    
                    <div class="clearer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <a href="#" class="disabled previousPage">
              Previous
            </a>
            
            <a href="#" class="nextPage">
              Next
            </a>
          </div>
          
          <div class="clear"></div>
        </div>
      </div>
      
      <div id="agentInfoExpanded" class="stackItem">
        <div class="agentBranding" style="background-color: #00467f;">
          <a href="/sold/by-wafbau/list-1">
            <img src="http://i2.au.reastatic.net/agencylogo/WAFBAU/2/20131031095047.gif" width="160" height="30" alt="Walsh &amp; Sullivan First National - Baulkham Hills" title="view all properties from Walsh &amp; Sullivan First National - Baulkham Hills" class="logo">
          </a>
        </div>
        
        <div class="agent">
          <a href="https://www.realestate.com.au/agent/scott-haggarty-1004671">
			  <div class="agentPhoto">
			    <img src="http://i3.au.reastatic.net/78x104/salespeople/1004671/1/20141206000000.jpg" width="78" height="104" alt="Scott Haggarty, " title="Scott Haggarty, ">
			  </div>
  		  </a>
  
	  	<div class="agentContactInfo">
		    <a href="https://www.realestate.com.au/agent/scott-haggarty-1004671">
			  <p class="agentName">
			    <strong>
			      Scott Haggarty
			    </strong>
			  </p>
			  </a>
			  
			  <ul class="linkList contactDetails">
			    <li class="phone">
			      <a href="#" rel="showContact" data-value="0414 072 084" data-id="118376283">
			         0414 072 084
			      </a>
			    </li>
			    
			    <li class="printHidden phoneHidden">
			      <img src="http://s2.rea.reastatic.net/rs/img/icons/phone.png$$3000.165-18" alt="">
			      0414 072 084
			    </li>
			    
			    <li class="agentProfile" style="display: list-item;">
			      <a href="https://www.realestate.com.au/agent/scott-haggarty-1004671">View profile 
				  	<div class="rui-icon rui-icon-arrow-right"></div>
			  	  </a>
			  	</li>
			  </ul>
		  </div>
	  </div>
  
	  <div class="agent">
	    <div class="agentPhoto">
	      <img src="http://i4.au.reastatic.net/78x104/salespeople/1004667/1/20141206000000.jpg" width="78" height="104" alt="Ian Haggarty, " title="Ian Haggarty, ">
	    </div>
	    
	    <div class="agentContactInfo">
	      <p class="agentName">
	        <strong>
	          Ian Haggarty
	        </strong>
	      </p>
	      
	      <ul class="linkList contactDetails">
	        <li class="phone">
	          <a href="#" rel="showContact" data-value="0414 639 738" data-id="118376283">
	            0414 639 738
	          </a>
	        </li>
	        
	        <li class="printHidden phoneHidden">
	          <img src="http://s2.rea.reastatic.net/rs/img/icons/phone.png$$3000.165-18" alt="">
	          0414 639 738
	        </li>
	      </ul>
	    </div>
	  </div>
  
  <div class="agentDetailWithEmailAgent">
    <div class="agencyDetails">
      <div class="contactDetails">
        <p class="agencyName">
          Walsh &amp; Sullivan First National - Baulkham Hills
        </p>
        
        <div class="adr">
          <p>
            <span class="street-address">
              12 Old Northern Rd
            </span>
          </p>
          
          <span class="locality">
            Baulkham Hills
          </span>
          , 
          <span class="region">
            NSW
          </span>
          
          <span class="postal-code">
            2153
          </span>
        </div>
      </div>
      
      
    </div>
    
  </div>
  
  <div class="clear"></div>
  </div>
  
  <div id="description" class="stackItem">
    <h3 class="address">
      <?php echo $property_name;?>
    </h3>
    
    <p class="title">
      SOLD BY SCOTT HAGGARTY &amp; IAN HAGGARTY
    </p>
    
    <p class="body" style="text-align:justify">
     <?php echo $property_description;?>
    </p>
    
    <div class="clearer">
    </div>
  </div>
  
 
  
  <div class="clear"> </div>
  
  <div id="features" class="stackItem">
    <div class="featureListWrapper">
      <div class="featureList">
        <ul>
          <li class="header">
            General Features
          </li>
          
          <li>
            Property Type:
            <span>
              <?php echo $property_type_name;?>
            </span>
          </li>
          
          <li>
            Bedrooms:
            <span>
              <?php echo $property_bedroom;?>
            </span>
          </li>
          
          <li>
            Bathrooms:
            <span>
              <?php echo $property_bathrooms;?>
            </span>
          </li>
          
          <li>
            Land Size:
            <span>
              <?php echo $property_size;?> m² (approx)
            </span>
          </li>
        </ul>
        
        <ul>
          <li class="header">
            Indoor Features
          </li>
          
          <li>
            Ensuite:
            <span>
              1
            </span>
          </li>
          
          <li>
            Reverse-cycle Air Conditioning
          </li>
          
          <li>
            Air Conditioning
          </li>
        </ul>
      </div>
    </div>
    
    <div class="featureListWrapper last">
      <div class="featureList">
        <ul>
          <li class="header">
            Outdoor Features
          </li>
          
          <li>
            Carport Spaces:
            <span>
              <?php echo $car_space_no;?>
            </span>
          </li>
          
          <li>
            Outdoor Entertaining Area
          </li>
          
          <li>
            Swimming Pool - Inground
          </li>
        </ul>
      </div>
    </div>
    
    <div class="clear">
    </div>
  </div>
  
  </div>

  <div class="col-sm-4 col-md-4 col-xs-4" >
 
    <section class="listing-map stackItem">
      <div class="listing-map-tabs">
        <div class="enlargeMap tab">
          <a href="#" rel="enlargeMap" data-listing="118376283">
            Enlarge Map
          </a>
        </div>
        
        <div class="enlargeStreetView tab">
          <a href="#" rel="enlargeStreetView" class="repname_streetView repkey_118376283">
            Street View
          </a>
        </div>
      </div>
      
      <div class="listing-map-contents">
        <div id="smallMapImage" class="dsMap olMap">
          <div id="OpenLayers.Map_8_OpenLayers_ViewPort" class="olMapViewport" style="position: relative; overflow: hidden; width: 100%; height: 100%;">
            <div id="OpenLayers.Map_8_OpenLayers_Container" style="position: absolute; width: 100px; height: 100px; z-index: 749; left: 0px; top: 0px;">
              <div id="OpenLayers.Layer.Markers_12" dir="ltr" class="olLayerDiv" style="position: absolute; width: 100%; height: 100%; z-index: 330;">
                <div id="OL_Icon_15" style="position: absolute; width: 36px; height: 31px; left: 134px; top: 94px;">
                  <img id="OL_Icon_15_innerImage" class="olAlphaImg" src="http://s1.rea.reastatic.net/rs/img/map_nodes/sold_center.png$$3000.165-18" style="position: relative; width: 36px; height: 31px;">
                </div>
              </div>
            </div>
            <div id="OpenLayers.Layer.Google_10" dir="ltr" class="olLayerDiv" style="position: absolute; width: 100%; height: 100%; z-index: 100;">
            </div>
            <div id="OpenLayers.Layer.Google_10_EventPane" style="position: absolute; z-index: 101; width: 100%; height: 100%;">
            </div>
            <div id="OpenLayers.Map_8_GMapContainer" style="position: absolute; width: 100%; height: 100%; background-color: rgb(229, 227, 223); overflow: hidden; -webkit-transform: translateZ(0px);">
              <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                  <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; -webkit-transform-origin: 0px 0px; -webkit-transform: matrix(1, 0, 0, 1, 0, 0);">
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                      <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                        <div style="position: absolute; left: 0px; top: 0px; z-index: 1;">
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: -58px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: -58px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: -314px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: 198px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: -58px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: -314px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: 198px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: -314px;">
                          </div>
                          <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: 198px;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                    </div>
                    <div style="position: absolute; z-index: 0; left: 0px; top: 0px;">
                      <div style="overflow: hidden; width: 292px; height: 250px;">
                        <img src="http://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i3856163&amp;2i2515002&amp;2e1&amp;3u14&amp;4m2&amp;1u292&amp;2u250&amp;5m5&amp;1e0&amp;5sen&amp;6sus&amp;10b1&amp;12b1&amp;token=18014" style="width: 292px; height: 250px;">
                      </div>
                    </div>
                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                      <div style="position: absolute; left: 0px; top: 0px; z-index: 1;">
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: -58px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15062!3i9824!2m3!1e0!2sm!3i290034716!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: -58px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15063!3i9824!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: 198px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15062!3i9825!2m3!1e0!2sm!3i290045059!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -291px; top: -314px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15062!3i9823!2m3!1e0!2sm!3i290027074!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: -58px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15064!3i9824!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: -314px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15064!3i9823!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: 198px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15063!3i9825!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: 221px; top: 198px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15064!3i9825!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                        <div style="width: 256px; height: 256px; -webkit-transform: translateZ(0px); position: absolute; left: -35px; top: -314px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;">
                          <img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i14!2i15063!3i9823!2m3!1e0!2sm!3i290027255!3m14!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjMzfHMuZTpsfHAudjpvZmY!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; -webkit-transform: translateZ(0px);">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;">
                  </div>
                  <div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; -webkit-transform-origin: 0px 0px; -webkit-transform: matrix(1, 0, 0, 1, 0, 0);">
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                    </div>
                    <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
                    </div>
                  </div>
                </div>
                <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
                  <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                    Map data ©2015 Google
                  </div>
                </div>
                <div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; display: none; position: absolute; right: 0px; bottom: 0px;">
                  <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                    <div style="width: 1px;">
                    </div>
                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                    </div>
                  </div>
                  <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
                    <a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@-33.7374153,150.9896698,14z/data=!10m1!1e1!13b1?source=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">
                      Report a map error
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div id="OpenLayers.Control.ScaleLine_14" class="olControlScaleLine olControlNoSelect" unselectable="on" style="position: absolute; z-index: 1001;">
              <div class="olControlScaleLineTop" style="visibility: visible; width: 52px;">
                500 m
              </div>
              <div class="olControlScaleLineBottom" style="visibility: visible; width: 64px;">
                2000 ft
              </div>
            </div>
            <div class="olLayerGoogleCopyright olLayerGoogleV3" draggable="false" style="z-index: 1100; position: absolute; -webkit-user-select: none; right: 0px; bottom: 0px;">
              <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                <div style="width: 1px;">
                </div>
                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                </div>
              </div>
              <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
                <a href="http://www.google.com/intl/en_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">
                  Terms of Use
                </a>
              </div>
            </div>
            <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 238px; height: 148px; position: absolute; left: 5px; top: 35px;">
              <div style="padding: 0px 0px 10px; font-size: 16px;">
                Map Data
              </div>
              <div style="font-size: 13px;">
                Map data ©2015 Google
              </div>
              <div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;">
                <img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
              </div>
            </div>
            <div class="olLayerGoogleCopyright olLayerGoogleV3" style="z-index: 1100; position: absolute; right: 290px; width: 12px; bottom: 0px;">
              <div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;">
                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                  <div style="width: 1px;">
                  </div>
                  <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                  </div>
                </div>
                <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;">
                  <a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer;">
                    Map Data
                  </a>
                  <span style="display: none;">
                    Map data ©2015 Google
                  </span>
                </div>
              </div>
            </div>
            <div class="olLayerGooglePoweredBy olLayerGoogleV3 gmnoprint" style="margin-left: 5px; margin-right: 5px; z-index: 1100; position: absolute; left: 0px; bottom: 0px;">
              <a target="_blank" href="http://maps.google.com/maps?ll=-33.737415,150.98967&amp;z=14&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;">
                <div style="width: 62px; height: 26px; cursor: pointer;">
                  <img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  	<div class="clear"></div>
  	</div>
  </div>
 </div>
 
  
 
  
</div>
<script type="text/javascript">
  // Can also be used with $(document).ready()
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails"
    }
                               );
  }
                );
</script>
 
             
<script type='text/javascript'>
    var LMI=LMI||{};LMI.Data={theme:"rea.sold",channel:"sold",channelColor:"#EDB200",site:"rea",appVersion:"3000.221",cacheBusterString:"3000.221-18",resourceServers:["http://s1.rea.reastatic.net","http://s2.rea.reastatic.net"],imageServers:["http://i1.au.reastatic.net","http://i2.au.reastatic.net","http://i3.au.reastatic.net","http://i4.au.reastatic.net"],pageName:"details",searchType:"sold",deleteVisitor:false,showPreferenceCenter:false,showNewConstructionFilterTip:false,visitorLoggedIn:false,listingId:"116354087",facebookAppId:"190577597636538",hasPhotoViewerAds:true,hasAds:true,state:{sessionId:"671C3AA488E897076B9552B0384F90AE",visitorVO:{alias:"",locale:{country:"AU",language:"en"},loggedInVisitor:false,preferredSort:"",preferredState:"",preferredView:"LIST",savedLocations:[],uid:"2c9ab8844bc34d04014bd3ebe625602b"}},recentLocations:[],findOnMapEnabled:"false",MyREA:{newSavedProps:true,numSavedProps:"0",anonMaxSavedProps:"5",fullBaseUrl:"https://www.realestate.com.au/"},strings:{},sessionPreferences:{property_type:"villa"},requestHiddens:{detailsListingId:"116354087"},sessionHiddens:null,Urls:{suggest:"/suggest.ds",whereSuggest:"/suggestwhere.ds",ddArrow:"http://s1.rea.reastatic.net/rs/img/icons/dd_arrow.png$$3000.221-18",internalDDArrow:"http://s2.rea.reastatic.net/rs/img/icons/dd_arrow_internal.png$$3000.221-18",largeDDArrow:"http://s1.rea.reastatic.net/rs/img/icons/dd_arrow_large.png$$3000.221-18",ddBg:"http://s2.rea.reastatic.net/rs/img/corners/dropdown_multi.png$$3000.221-18",ddBgLarge:"http://s1.rea.reastatic.net/rs/img/corners/dropdown_multi_large.png$$3000.221-18",formPopupScript:"http://s2.rea.reastatic.net/rs/form_popups.js$$3000.221-18",formPopupStyle:"http://s2.rea.reastatic.net/rs/form_popups.css$$3000.221-18&locale=en_AU&theme=rea.sold",feedback:"/emailfeedbackform.ds?theme=rea.sold",advertise:"/emailadvertiseform.ds?theme=rea.sold",inspectionSearch:"/ofipopup.ds?theme=rea.sold",premierePropertySearch:"/premierepopup.ds?theme=rea.sold",removeLocations:"/removerecentlocations.ds",removeSearches:"/removerecentsearches.ds",stateLocations:"/statelocations.ds",stateLocationsJson:"/statelocationsjson.ds",signin:"/login.ds?theme=rea.sold&pageFrom=details",register:"/register.ds?theme=rea.sold",resiAPI:"http://services.realestate.com.au",searchMap:"/searchmap.ds",searchMapJson:"/searchmapjson.ds",emailAlert:"/my-real-estate/saved-search/subscribe?searchType=saved&prop_minPrice=350000&prop_maxPrice=450000&prop_numBeds=2&prop_propertyType=villa&prop_channel=sold&prop_listingType=sold&prop_searchView=list&prop_domain=www.realestate.com.au&prop_preferredState=nsw&prop_where=Castle+Hill,+NSW+2154&prop_resolvedLocations=%7CCastle+Hill%2C+NSW+2154%7C&prop_resolvedLocationCodes=%7CS-448%7C&prop_resolvedSurroundingLocationCodes=%7CS-455%7CS-452%7CS-449%7CS-444%7CS-10510%7CS-386%7CS-387%7CS-443%7C"},PrettyUrls:{"search.ds":"/sold/","listsearchview.ds":"/sold/","mapsearchview.ds":"/sold/","gallerysearchview.ds":"/sold/",mapsearch:"/sold/",buySearch:"/buy/",rentSearch:"/rent/",soldSearch:"/sold/",newHomesSearch:"/new-homes/",refine:"/sold/"},baseUrl:"/",messageDebug:false};</script><script type='text/javascript' src='http://s1.rea.reastatic.net/rs/lm_init.js$$3000.221-18'></script><script type='text/javascript' src="http://s2.rea.reastatic.net/rs/lm_messages.js$$3000.221-18&locale=en_AU&theme=rea.sold&partnerSiteId="/></script><script type='text/javascript' src='http://s1.rea.reastatic.net/rs/lm_common_rui.js$$3000.221-18'></script><!--[if lt IE 9]><script src="http://s1.rea.reastatic.net/rs/js/common/3rdparty/PIE.js$$3000.221-18"></script><![endif]--><script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&v=3.6&client=gme-nsp&language=en&channel=prod-resi-details&locale=en_AU&theme=rea.sold"></script><script type="text/javascript" src="http://s2.rea.reastatic.net/rs/maps.js$$3000.221-18&locale=en_AU&theme=rea.sold"></script><script type="text/javascript" src="http://s1.rea.reastatic.net/rs/page_details.js$$3000.221-18&locale=en_AU&theme=rea.sold"></script><script type="text/javascript" src="http://s2.rea.reastatic.net/rs/form_popups.js$$3000.221-18&locale=en_AU&theme=rea.sold"></script><script type="text/javascript" src="http://s2.rea.reastatic.net/rs/privacy_policy.js$$3000.221-18&locale=en_AU&theme=rea.sold"></script>
	<script type='text/javascript'>
            LMI.Data.whereValue="";(function(){var A=LMI.Data;A.mapOptions={defaultLat:-24.9162,defaultLng:133.393112,emptyZoom:4,suburbZoom:11,stateZoom:4,imageBase:LMI.Urls.get("/img/mapping/"),overviewCollapsed:true,zoomWheelEnabled:false};A.directionsActivated=true;var B=LMI.Mapping;B.IconUrls={smallMap:"http://s1.rea.reastatic.net/rs/img/map_nodes/sold.png$$3000.221-18",center:"http://s2.rea.reastatic.net/rs/img/map_nodes/sold_center.png$$3000.221-18",mapSearch:"http://s1.rea.reastatic.net/rs/img/map_nodes/map_search_sold.png$$3000.221-18",mapSearch_multi:"http://s2.rea.reastatic.net/rs/img/map_nodes/map_search_sold_multi.png$$3000.221-18",hover:"http://s1.rea.reastatic.net/rs/img/map_nodes/hover.png$$3000.221-18",agentOffice:"http://s2.rea.reastatic.net/rs/img/map_nodes/agent_office.png$$3000.221-18",mapSearchHover:"http://s1.rea.reastatic.net/rs/img/map_nodes/map_search_hover.png$$3000.221-18",directions:"http://s2.rea.reastatic.net/rs/img/map_nodes/directions.png$$3000.221-18",newStop:"http://s1.rea.reastatic.net/rs/img/map_nodes/plus.png$$3000.221-18",myplaces:"http://s2.rea.reastatic.net/rs/img/map_nodes/my_places.png$$3000.221-18",newPlace:"http://s2.rea.reastatic.net/rs/img/map_nodes/my_places.png$$3000.221-18"}})();LMI.Data.listings=[{addressHidden:false,addressResolution:null,agencyId:"WAFBAU",agencyIdsAsString:"WAFBAU",agentLogoLarge:{src:"/agencylogo/WAFBAU/12/20131031095047.gif",title:"view all properties from Walsh & Sullivan First National - Baulkham Hills"},agentLogoUrlForOneForm:"/agencylogo/WAFBAU/2/20131031095047.gif",agentPrimaryColor:"00467f",agentTextColor:"ffffff",auctionEvent:null,auctionTime:"",businessName:"3/29-31 Hughes Ave, Castle Hill, NSW 2154",city:"Castle Hill",conjunctional:false,displayPrice:"Contact Agent",displayTenureType:"sold",externalUrls:{youTubeVideoId:""},featuredStatus:"",geoCoded:true,hasPhotos:true,id:"116354087",inspectionEvents:[],latitude:-33.733036041259766,listingCategoryE:"RESIDENTIAL_SOLD",listingNumber:1,listingSource:"SOLD",longitude:150.99215698242188,name:"3/29-31 Hughes Ave, Castle Hill, NSW 2154",numBeds:2,pageViews:3653,photos:[{src:"/937998ba8ab603a14dfd778709d741e949c26dbc5528541f880c0baba536016f/main.jpg",title:"3/29-31 Hughes Ave, Castle Hill, NSW 2154"},{src:"/33067ed6a8775b3a25b9299d077ace1db9562f9eece1cb12142894fe05337198/image2.jpg",title:"3/29-31 Hughes Ave, Castle Hill, NSW 2154"},{src:"/9884058d22f023bacbd9e6bf3745755f7f4c3296e08903669cbca8b5e8a5316a/image3.jpg",title:"3/29-31 Hughes Ave, Castle Hill, NSW 2154"},{src:"/ba392dad393fe9dafaf1e94fab48d9a3edb19a5345df09b5dd8803b83b95a200/floorplan1.gif",title:"3/29-31 Hughes Ave, Castle Hill, NSW 2154 - floorplan"}],postalCode:"2154",prettyDetailsUrl:"/property-villa-nsw-castle+hill-116354087",productType:"standard",propertyTypeE:"VILLA",showOnMap:true,showVendorUpgrade:false,state:"NSW",stateLatitude:0,stateLongitude:0,streetAddress:"3/29-31 Hughes Ave",streetView:{cameraLatitude:-33.733036041259766,cameraLongitude:150.99215698242188,pitch:0,yaw:0,zoom:1},suburbLatitude:0,suburbLongitude:0,tier:"",title:"SOLD BY SCOTT HAGGARTY & IAN HAGGARTY",video:null}];LMI.Data.dontWatch=true;(function(){LMI.Data.photoviewerPagination={pageSize:3,verticalScrolling:true};LMI.Data.photoviewerOptions={thumbWidth:120,thumbHeight:90,previewWidth:456,displayWidth:456,previewHeight:342,displayHeight:342}})();LMI.Data.numAlsoViewed=12;LMI.Data.whereValue="";</script>
			