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
        $('.model_single img, .photo_name').delay(1000).fadeIn('slow');

        $('#editorial_tab').addClass('tab_active');
        $('#editorial').fadeIn();

        $('#editorial_tab').click(function () {
            $('#editorial').fadeIn();
            $('#beauty').fadeOut();
            $('#advertising').fadeOut();
            $('#videos').fadeOut();
            $('#bio').fadeOut();
            $('#editorial_tab').addClass('tab_active');
            $('#beauty_tab').removeClass('tab_active');
            $('#advertising_tab').removeClass('tab_active');
            $('#videos_tab').removeClass('tab_active');
            $('#bio_tab').removeClass('tab_active');
        });

        $('#beauty_tab').click(function () {
            $('#editorial').fadeOut();
            $('#beauty').fadeIn();
            $('#advertising').fadeOut();
            $('#videos').fadeOut();
            $('#bio').fadeOut();
            $('#editorial_tab').removeClass('tab_active');
            $('#beauty_tab').addClass('tab_active');
            $('#advertising_tab').removeClass('tab_active');
            $('#videos_tab').removeClass('tab_active');
            $('#bio_tab').removeClass('tab_active');
        });

        $('#advertising_tab').click(function () {
            $('#editorial').fadeOut();
            $('#beauty').fadeOut();
            $('#advertising').fadeIn();
            $('#videos').fadeOut();
            $('#bio').fadeOut();
            $('#editorial_tab').removeClass('tab_active');
            $('#beauty_tab').removeClass('tab_active');
            $('#advertising_tab').addClass('tab_active');
            $('#videos_tab').removeClass('tab_active');
            $('#bio_tab').removeClass('tab_active');
        });

        $('#videos_tab').click(function () {
            $('#editorial').fadeOut();
            $('#beauty').fadeOut();
            $('#advertising').fadeOut();
            $('#videos').fadeIn();
            $('#bio').fadeOut();
            $('#editorial_tab').removeClass('tab_active');
            $('#beauty_tab').removeClass('tab_active');
            $('#advertising_tab').removeClass('tab_active');
            $('#videos_tab').addClass('tab_active');
            $('#bio_tab').removeClass('tab_active');
        });

        $('#bio_tab').click(function () {
            $('#editorial').fadeOut();
            $('#beauty').fadeOut();
            $('#advertising').fadeOut();
            $('#videos').fadeOut();
            $('#bio').fadeIn();
            $('#editorial_tab').removeClass('tab_active');
            $('#beauty_tab').removeClass('tab_active');
            $('#advertising_tab').removeClass('tab_active');
            $('#videos_tab').removeClass('tab_active');
            $('#bio_tab').addClass('tab_active');
        });

        

     });
    </script>

    <style>
        .model_single img, .photo_name{display: none;}
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
            <div class="tab_menu">
                <a href="<?php echo site_url("website/creativeartists?id=").$photographer->id."&name=".$creativecat->name; ?>">Back</a><br />
                <?php echo $creativecat->name?><span class="photographer_name"><i><?php echo $photographer->name; ?> - <?php echo $photographer->city; ?></i></span>
            </div>
            <div class="photo_tabs">
               <?php foreach($photographercats as $photographercat) { ?>
                <a href="<?php echo site_url("website/artistgallery?id=").$photographercat->id."&creative=".$photographer->id;;?>" id="editorial_tab"><?php echo $photographercat->name; ?></a>
                <?php } ?>
                <a href="#" id="videos_tab">Videos</a>
                <a href="#" id="bio_tab">Bio</a>
            </div>

            <div id="editorial">
               <?php foreach($albums as $album) { ?>
                <div class="col-h model_single"><a href="<?php echo site_url("website/albuminner?id=").$album->id;?>"><img src="<?php echo base_url("uploads")."/".$album->image;?>" class="display" alt="1"><span class="photo_name"><?php echo $album->title; ?></span></a></div>
                
                <?php } ?>

            <?php include('footer.php'); ?>
            </div>
            <div id="beauty">
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/coverstories/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>    

            <?php include('footer.php'); ?>
            </div>
            
            
            <div id="advertising">
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Men 1</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Men 2</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Men 3</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Men 4</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Men 5</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Men 6</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Men 7</span></a></div> 
            <?php include('footer.php'); ?>
            </div>
            
            
            <div id="videos">
                <div class="vid">
                <?php foreach($videos as $video) { ?>
                <iframe src="<?php echo $video->video; ?>"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <?php } ?>
                </div>    

            <?php include('footer.php'); ?>
            </div>
            
            
            <div id="bio">
                <div class="bio_inner">
                    <p><?php echo $photographer->bio; ?></p><br /><br />
                    <p><strong>Magazines</strong></p>
                    <table border="0" class="bio_table">
                        <tr>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                            <td><a href="#">Magzine</a></td>
                        </tr>
                    </table>
                </div>
                <div class="bio_inner">
                    <p><?php echo $photographer->bio; ?> </p>                </div>
                
                                 
            <?php include('footer.php'); ?>
            </div>
    
        </div>
        
             
    </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.instastream.js"></script>
    
</body>

</html>