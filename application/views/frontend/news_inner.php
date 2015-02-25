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
    <script src="<?php echo base_url("frontend")."/";?>https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo base_url("frontend")."/";?>js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>

</head><!--/head-->
<body>
	<!-- Page Loader -->
	<!--<div class="preloader">
        <div id="loaderImage"></div>
    </div>-->
    <div class="wrapper">
   <!-- <center><a href="index.php"><img class="logo" src="<?php echo base_url("frontend")."/";?>images/logo.png" alt="logo"></a></center>-->

  <?php $this->load->view("frontend/header"); ?>

  
     
        <div class="container">
            <div class="bio_inner">
                <img src="<?php echo base_url("frontend")."/";?>images/model/5.jpg" style="width: 90%; float: right; ">
                <img src="<?php echo base_url("frontend")."/";?>images/model/11.jpg" style="width: 90%; float: right; ">
                <img src="<?php echo base_url("frontend")."/";?>images/model/5.jpg" style="width: 90%; float: right; ">
                <img src="<?php echo base_url("frontend")."/";?>images/model/11.jpg" style="width: 90%; float: right; margin-bottom: 40px; ">
            </div>
            <div class="bio_inner">
                <p>16.01.2015</p>
                <p><strong><?php echo $news->title;?></strong></p>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
            </div>
        </div>
        <?php include('footer.php'); ?>
            </div>
    </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.instastream.js"></script>
    
</body>

</html>