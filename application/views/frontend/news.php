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
	<link href="<?php echo base_url("frontend")."/";?>css/insta.css" rel="stylesheet">	
	<link href="<?php echo base_url("frontend")."/";?>css/dl-menu.css" rel="stylesheet">	

    <script src="<?php echo base_url("frontend")."/";?>js/modernizr.custom.js"></script>
	<style>.load4{ display: block; } .loader{display: none;}</style>
</head><!--/head-->
<body>
	<!-- Page Loader -->
	<!--<div class="preloader">
        <div id="loaderImage"></div>
    </div>-->
    <div class="wrapper">
    <?php $this->load->view("frontend/header"); ?>
        <div class="container">
            <!--<div id="insta"></div>-->
            <div id="news_block">
                <ul id="lazyScrollLoading">
                <?php foreach($newss as $news) { ?>
                <a href="<?php echo site_url("website/newsinner?id=").$news->id;?>"><li>    
                <div class="news">
                    <img src="<?php echo base_url("uploads")."/".$news->image;?>">
                    <strong><?php echo $news->title;?></strong><hr />
                    <?php echo $news->content;?>
                </div>
                </li></a>
                
                <?php } ?>
               
                </ul>
                

                <!--<div class="title" id="loadMore">Load more</div>-->
                
            
                    
        </div>



            <?php include('footer.php'); ?>                  
            </div>
    </div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url("frontend")."/";?>js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>

	<!--/#scripts--> 
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/custom.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.instastream.js"></script>-->
    <script type="text/javascript">
        

        //$(window).scroll(function () {
        //    $('.load2').each(function (i) {
        //        var bottom_of_object = $(this).position().top + $(this).outerHeight();
        //        var bottom_of_window = $(window).scrollTop() + $(window).height();
        //        var bottom_of_object = bottom_of_object - 450;
        //        if (bottom_of_window > bottom_of_object) {
        //            $('.load3').delay(4000).fadeOut(1000);
        //            $('.load4').delay(5000).fadeIn(1000);
        //        }
        //    });
        //});
        //

    </script>
    
    
</body>

</html>