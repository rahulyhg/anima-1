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
	<!--<link href="<?php echo base_url("frontend")."/";?>css/jcarousel.css" rel="stylesheet">--> 
    <link href="<?php echo base_url("frontend")."/";?>css/jcarousel.connected-carousels.css" rel="stylesheet">	
	<link href="<?php echo base_url("frontend")."/";?>css/dl-menu.css" rel="stylesheet">	
	<link href="<?php echo base_url("frontend")."/";?>css/insta.css" rel="stylesheet">	
    <script src="<?php echo base_url("frontend")."/";?>js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jcarousel.connected-carousels.js"></script>
    <script src="<?php echo base_url("frontend")."/";?>js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
	<script type="text/javascript">
     $(document).ready(function () {
         $('.model_single img, .photo_name').delay(1000).fadeIn('slow');
         var windowWidth = $(window).width();
         $(window).resize(function () {
             if (windowWidth != $(window).width()) {
                 location.reload();
                 return;
             }
         });
         var winHeight = $(window).height();
         if (windowWidth > 1200) {
             var stageHeight = winHeight - 70;
             var img_height = stageHeight - 10;
             $('.connected-carousels .carousel-stage').css('height', stageHeight);
             $('.two_img img').css('height', img_height);
             $('.first_img').css('height', img_height);
             $('.model_info').css('height', stageHeight - 10);
         }
         $('.prev-stage').trigger("click");
         $('.prev-navigation').trigger("click");

         $('#editorial_tab').addClass('tab_active');
         $('#editorial').fadeIn();
         //$('.photo_tabs a').click(function () {
         //    id = this.id;
         //    $('#' + id).click(function () {
         //        $('#' + id + '_div').fadeIn();
         //    });
         //});


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

         //$('.carousel-navigation').click(function () {
         //    $('.connected-carousels .stage').css("opacity", "0");
         //    //$('.connected-carousels .stage').delay(500).css("opacity", "100");
         //});

         //$('.next-stage').click(function () {
         //    $('.connected-carousels .stage').fadeOut(10);
         //    $('.connected-carousels .stage').delay(100).fadeIn(10);

         //});


         //$('.prev-stage').click(function () {
         //    $('.connected-carousels .stage').css("opacity", "0");
         //    $('.connected-carousels .stage').delay(500).css("opacity", "100");

         //});

         //var doc = $(document).height();
         //$("#backto").css("height",doc);

         //$("#backto").click(function () {
         //    alert(1);
         //});

         leftspace();

         
     });

     
     function leftspace() {
         var carousel_width = $('.carousel-stage').width();
         var double_width = $('.double_img').width();
         var double_left = carousel_width - double_width;
         var double_half = double_left / 2;
         $('.carousel-stage li').css('width', carousel_width);
         //$('.double_img').css("margin-left", double_half);
     }
    </script>

    <style>
        .wrapper { width: 1024px;}
        .model_single img, .photo_name{display: none;}
        .photo_tabs, .tab_menu{ height: auto; padding-bottom: 5px;}
        .double_img{ margin-left: 1%; }
        .double_img img, .first_img img{max-width: 49%; min-width: 49%;}
        @media screen and (min-width: 1024px){
            #editorial, #beauty, #advertising, #videos, #bio{ width: 1024px; top:30px;}
        }
</style> 
</head><!--/head-->
<body>
	<!-- Page Loader -->
	<!--<div class="preloader">
        <div id="loaderImage"></div>
    </div>-->
    <div id="mask"><span class="close_mask">X</span></div>
    <div id="backto">        
    <div class="wrapper">
        <div class="container" style="margin-top: 0;">
            <div class="tab_menu">
               
                <a href="<?php echo site_url("website/artistgallery?id=$category->subcatid&creative=$category->artistid"); ?>"><?php echo $category->subcatname ?></a><span class="photographer_name model_up_name" style="opacity:1;"><i><?php echo $category->artistname; ?></i></span>
            </div>
            

            <div id="editorial">
            
                <div class="connected-carousels">
                <div class="stage">
                    <div class="carousel carousel-stage">
                        <ul>
                            <li>
                                <div class="double_img">
                                    <a href="<?php echo site_url("website/models?id=").$model->category; ?>" class="black_link">
                                    <!--<div class="model_info">
                                        <img src="<?php echo base_url("frontend")."/";?>images/logo.png" class="small_logo">
                                        

                             
                                    </div>-->
                                    </a>
                                    <!--<?php print_r($modelimages) ?>-->
                                    <img src="<?php echo base_url("uploads")."/".$modelimages[0]->image?>" style="float: left;" height="100%" alt="">
                                </div>
                            </li>
                            <?php $length = count($modelimages); for($x = 1; $x<$length; $x++) { 
                            if($modelimages[$x]->type == "1") { ?>
                            <li><img src="<?php echo base_url("uploads")."/".$modelimages[$x]->image ?>" height="100%" style="width:98%;" alt=""></li>
                            <?php } else if($modelimages[$x]->type=="0"){?>                     
                            <li><div class="double_img"><img src="<?php echo base_url("uploads")."/".$modelimages[$x]->image ?>" style="float: left;" alt=""><img src="<?php echo base_url("uploads")."/".$modelimages[++$x]->image ?>" style="float: left;" alt=""></div></li>
                            <?php }; };?>
                        </ul>
                    </div>
                    <a href="#" class="prev prev-stage"></a>
                    <a href="#" class="next next-stage"></a>
                </div>
                    
                <!--<span class="details">height: 5 ft 9(69 in) chest: 32 in  waist: 24 in hips: 35 in dress: 4 shoe: 7</span>-->
                <div class="navigation">
                    <a href="#" class="prev prev-navigation"><img src="<?php echo base_url("frontend")."/";?>images/prev.png"></a>
                    <a href="#" class="next next-navigation"><img src="<?php echo base_url("frontend")."/";?>images/next.png"></a>
                    <div class="carousel carousel-navigation">
                        <ul>
                            <li id="first_child"><img src="<?php echo base_url("uploads")."/".$modelimages[0]->image ?>" alt=""></li>
                            <?php for($y=1; $y<$length; $y++) { if($modelimages[$y]->type == "1") { ?>
                            <li><img src="<?php echo base_url("uploads")."/".$modelimages[$y]->image ?>" alt=""></li>         <?php } else if($modelimages[$y]->type=="0") {  ?>
                            <li><img src="<?php echo base_url("uploads")."/".$modelimages[$y]->image ?>" alt="" style="float: left;"><img src="<?php echo base_url("uploads")."/".$modelimages[++$y]->image ?>"  alt="" style="float: left;"></li>
                            <?php } }; ?>
                            
                        </ul>
                    </div>
                </div>
            </div>




            </div>
            
            
            <div id="advertising">
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Men 1</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Men 2</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Men 3</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Men 4</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Men 5</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Men 6</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="<?php echo base_url("frontend")."/";?>images/photographers/album/men/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Men 7</span></a></div> 
            
            </div>
            
            
            
            
           
            
    
        </div>
        
             
    </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url("frontend")."/";?>js/jquery.instastream.js"></script>
    </div>
</body>

</html>