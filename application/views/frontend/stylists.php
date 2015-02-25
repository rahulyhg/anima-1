<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themeregion.com/doors -fade-slider/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Nov 2014 12:18:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!--title-->
    <title>Anima Creative Management</title>
	
	<!--CSS-->
	<link href="<?php echo base_url("frontend")."/";?>css/style.css" rel="stylesheet">	
	<link href="<?php echo base_url("frontend")."/";?>css/dl-menu.css" rel="stylesheet">	
	<link href="<?php echo base_url("frontend")."/";?>css/insta.css" rel="stylesheet">	
    <script src="<?php echo base_url("frontend")."/";?>js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo base_url("frontend")."/";?>js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
	<script type="text/javascript">

     $(document).ready(function () {
         $('.model_single a img, .model_name').delay(1000).fadeIn('slow');

     });
    </script>

    <style>
        .model_single a img, .model_name{display: none;}
</style>
</head><!--/head-->
<body>
	<!-- Page Loader -->
	<!--<div class="preloader">
        <div id="loaderImage"></div>
    </div>-->
    <div class="wrapper">
    <?php $this->load->view("frontend/header"); ?>
        <!--<header class="mobile_menu"> 
            <a href="index.php"><div class="mobile_logo"></div></a>
            <div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger"></button>
						<ul class="dl-menu">
							<li>
								<a href="#">Model</a>
								<ul class="dl-submenu">
							        <li><a href="females_in_town.php">Female In Town</a></li>
							        <li><a href="#">Female Out of Town</a></li>
							        <li><a href="#">Male In Town</a></li>
							        <li><a href="#">Male Out of Town</a></li>
					        	</ul>
					    </li>
					    <li><a href="#">Creative Artists</a></li>
                        <li><a href="#">Agency</a></li>
                        <li><a href="#">News</a></li>
						</ul>
					</div>
        </header>--> 


        <div class="container">
            <span class="title_section">Stylists </span>
            <div class="photographers" style="height: 300px;">
                <div class="col-5 model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/miguel.jpg" class="displayed" alt="1"><span class="model_name">Zeenat Wilkinson<br />Aukland</span></a></div>
                    
        </div>
        <?php include('footer.php'); ?>
        </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.instastream.js"></script>
    
</body>

</html>