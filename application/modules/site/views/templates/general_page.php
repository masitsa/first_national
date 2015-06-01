<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html> <!--<![endif]-->
 <head>
        <?php echo $this->load->view('site/includes/header', '', TRUE); ?>
 </head>
<body>
	<div class="top-navigation">

	    <div class="container">
	        <div class="top-wrapper clearfix">
	            <div class="top-left">
	            	<!-- Part of the Walsh & Sullivan Group -->
	                
	            </div>
	            <div class="top-center">
	            	<ul class="social" style="">
	                    <li style="border-left:1px"><a href="https://www.facebook.com/firstnationalbaulkhamhills " target="_blank"><i class="fa fa-facebook"></i></a></li>
	                    <li><a href="https://twitter.com/HaggartyRE" target="_blank"><i class="fa fa-twitter"></i></a></li>
	                    <li><a href="http://www.youtube.com/channel/UCMWrW1z0TK1s-jrrXx2UVQg" target="_blank"><i class="fa fa-youtube"></i></a></li>
	                    <li><a href="https://plus.google.com/u/0/114966265112746135848/posts " target="_blank"><i class="fa fa-google-plus"></i></a></li>
	                </ul>
	                
	            </div>
	            <div class="top-right">
	                <a href="tel:0414072084" ><i class="fa fa-phone"></i></i> 0414 072 084</a>
	            </div>
	        </div>
	    </div>
	</div>
<!-- // Top Navigation -->
	<?php echo $this->load->view('site/includes/top_navigation', '', TRUE); ?>

	 <?php echo $content;?>

	 <?php echo $this->load->view('site/includes/footer', '', TRUE); ?>

</body>
</html>
