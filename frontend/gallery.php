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
	<link href="css/style.css" rel="stylesheet">	
	<!--<link href="css/jcarousel.css" rel="stylesheet">--> 
    <link href="css/jcarousel.connected-carousels.css" rel="stylesheet">	
	<link href="css/dl-menu.css" rel="stylesheet">	
	<link href="css/insta.css" rel="stylesheet">	
    <script src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="js/jcarousel.connected-carousels.js"></script>
    <script src="js/jquery.dlmenu.js"></script>
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

             $('.connected-carousels .carousel-stage').css('height', stageHeight);
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


         var carousel_width = $('.carousel-stage').width();
         var double_width = $('.double_img').width();
         var double_left = carousel_width - double_width;
         var double_half = double_left / 2;
         $('.carousel-stage li').css('width', carousel_width);
         $('.double_img').css("margin-left", double_half);

     });
    </script>

    <style>
        .wrapper { width: 1024px;}
        .model_single img, .photo_name{display: none;}
        .photo_tabs, .tab_menu{ height: auto; padding-bottom: 5px;}
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
                <a href="females_in_town.php">female in town</a><span class="photographer_name model_up_name"><i>alicia surname</i></span>
            </div>
            <div class="photo_tabs" style="padding-top: 0;">
                <a href="#" id="editorial_tab">portfolio</a>
                <a href="#" id="beauty_tab">polaroids</a>
                <a href="#" id="advertising_tab">shows</a>
                <a href="#" id="videos_tab">videos</a>
                <a href="#" id="bio_tab">bio</a>
            </div>

            <div id="editorial">
            
                <div class="connected-carousels">
                <div class="stage">
                    <div class="carousel carousel-stage">
                        <ul>
                            <li>
                                <div class="double_img">
                                    <a href="females_in_town.php" class="black_link">
                                    <div class="model_info">
                                        <img src="images/logo.png" class="small_logo">
                                        <table align="center" class="model_table">
                                            <!--<tr><td colspan="2"><img src="images/mobile_logo.png" height="18"></td></tr>-->
                                            <tr><td colspan="2" class="model_n"><center>alicia surname</center></td></tr>
                                            <tr><td class="att">height</td><td class="value">176cm/5'8.5</td></tr>
                                            <tr><td class="att">bust</td><td class="value">82cm/32"</td></tr>
                                            <tr><td class="att">waist</td><td class="value">64cm/24"</td></tr>
                                            <tr><td class="att">hips</td><td class="value">89cm/35"</td></tr>
                                            <tr><td class="att">eyes</td><td class="value">brown</td></tr>
                                            <tr><td class="att">brown</td><td class="value">brown</td></tr>
                                            <tr><td class="att">shoe</td><td class="value">39</td></tr>
                                        </table>

                             
                                    </div></a>
                                    <img src="images/model/1.jpg" style="float: left;" height="100%" alt="">
                                </div>
                            </li>
                            <li><img src="images/model/2.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/4.jpg" height="100%" alt=""></li>
                            <li><div class="double_img"><img src="images/model/5.jpg" style="float: left;" height="100%" alt=""><img src="images/model/6.jpg" style="float: left;" height="100%" alt=""></div></li>
                            <li><img src="images/model/7.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/8.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/9.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/10.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/11.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/12.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/13.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/14.jpg" height="100%" alt=""></li>
                            <li><div class="double_img"><img src="images/model/15.jpg" style="float: left;" height="100%" alt=""><img src="images/model/18.jpg" style="float: left;" height="100%" alt=""></div></li>
                            <li><img src="images/model/16.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/17.jpg" height="100%" alt=""></li>
                            <li><img src="images/model/19.jpg" height="100%" alt=""></li>
                        </ul>
                    </div>
                    <a href="#" class="prev prev-stage"></a>
                    <a href="#" class="next next-stage"></a>
                </div>
                    
                <!--<span class="details">height: 5 ft 9(69 in) chest: 32 in  waist: 24 in hips: 35 in dress: 4 shoe: 7</span>-->
                <div class="navigation">
                    <a href="#" class="prev prev-navigation"><img src="images/prev.png"></a>
                    <a href="#" class="next next-navigation"><img src="images/next.png"></a>
                    <div class="carousel carousel-navigation">
                        <ul>
                            <li id="first_child"><img src="images/model/1.jpg" alt=""></li>
                            <li><img src="images/model/2.jpg" alt=""></li>
                            <li><img src="images/model/4.jpg" alt=""></li>
                            <li><img src="images/model/5.jpg" alt="" style="float: left;"><img src="images/model/6.jpg"  alt="" style="float: left;"></li>
                            <li><img src="images/model/7.jpg" alt=""></li>
                            <li><img src="images/model/8.jpg" alt=""></li>
                            <li><img src="images/model/9.jpg" alt=""></li>
                            <li><img src="images/model/10.jpg" alt=""></li>
                            <li><img src="images/model/11.jpg" alt=""></li>
                            <li><img src="images/model/12.jpg" alt=""></li>
                            <li><img src="images/model/13.jpg" alt=""></li>
                            <li><img src="images/model/14.jpg" alt=""></li>
                            <li><img src="images/model/15.jpg" alt="" style="float: left;"><img src="images/model/18.jpg"  alt="" style="float: left;"></li>
                            <li><img src="images/model/16.jpg" alt=""></li>
                            <li><img src="images/model/17.jpg" alt=""></li>
                            <li><img src="images/model/19.jpg" alt=""></li>
                            
                        </ul>
                    </div>
                </div>
            </div>




            </div>
            <div id="beauty">
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/coverstories/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Portugal cover stories</span></a></div>    

            
            </div>
            
            
            <div id="advertising">
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Men 1</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Men 2</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Men 3</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Men 4</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Men 5</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Men 6</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Men 7</span></a></div> 
            
            </div>
            
            
            <div id="videos">
                <div class="vid">
                <iframe src="//player.vimeo.com/video/111553596"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/41755731"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/11927571"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/19457624"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>    
                
                <div class="video_thumb">
                    <div class="thumbs"><img src="images/video/thumb1.jpg"><span>video name</span></div>
                    <div class="thumbs"><img src="images/video/thumb2.jpg"><span>video name</span></div>
                    <div class="thumbs"><img src="images/video/thumb3.jpg"><span>video name</span></div>
                    <div class="thumbs"><img src="images/video/thumb4.jpg"><span>video name</span></div>

                </div>
            
            </div>
            
            <div class="big_video">
                <iframe src="//player.vimeo.com/video/19457624"  width="750" height="510" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

            <div id="bio">
                <div class="bio_inner">
                    <img src="images/model/5.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><br /><br />
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
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.  </p><p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  </p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>                </div>
                
                                 
            
            </div>
    
        </div>
        
             
    </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="js/jquery.js"></script>-->
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jquery.instastream.js"></script>
    </div>
</body>

</html>