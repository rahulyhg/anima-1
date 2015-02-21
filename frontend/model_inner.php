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
	<link rel="stylesheet" href="css/gallery.css" type="text/css">
    <link href="css/dl-menu.css" rel="stylesheet">	
	<link href="css/insta.css" rel="stylesheet">	
    <script src="js/jquery.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
	<script type="text/javascript">

     $(document).ready(function () {

        $('.model_single img, .photo_name').delay(1000).fadeIn('slow');

        $('#editorial_tab').addClass('tab_active');
        $('#editorial').css("display","block");
        $('#slider_2').delay(2000).css("display","block");
        

        $('#editorial_tab').click(function () {
            $('#editorial').fadeIn();
            $('#slider_2').fadeIn();
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
            $('#slider_2').fadeOut();
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
            $('#slider_2').fadeOut();
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
            $('#slider_2').fadeOut();
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
            $('#slider_2').fadeOut();
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
        #editorial, #beauty, #advertising, #videos, #bio{ top:50px;}
</style>
	
    </head>
    <body>
        <div id="wrapper2">
       			
            <div class="tab_menu">
                <a href="females_in_town.php">Back</a><br />
                Females in town
            </div>
            <div class="photo_tabs">
                <a href="#" id="editorial_tab">Editorial</a>
                <a href="#" id="beauty_tab">Cover stories</a>
                <a href="#" id="advertising_tab">Men</a>
                <a href="#" id="videos_tab">Videos</a>
                <a href="#" id="bio_tab">Bio</a>
            </div>

            <div id="editorial">

			<div class="prev_next"><a id="next"></a><a id="prev"></a></div>	
           <div id="slider">
               		
				<div class="slide" id="main_slide1">
                                <div class="two_img model_info">
                            <!--<table class="info_table">
                                <tr><td colspan="2"><span class="modelname">Model Name</span></td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                                <tr><td>Attribute</td><td>Value</td></tr>
                            </table>-->
                            <div class="model_details">
                                <div class="modelname">Alicia Surname</div><br />
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>
                                <div class="att">Attribute</div><div class="value">Value</div>

                            </div>    

                        </div>
                <div class="two_img"><img src="images/model/1.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide2">
                        <div class="single_img"><img src="images/model/2.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide3">
                        <div class="single_img"><img src="images/model/4.jpg"></div>
				</div>
				
				<div class="slide"  id="main_slide4">
                        <div class="two_img"><img src="images/model/5.jpg"></div><div class="two_img"><img src="images/model/6.jpg"></div>
				</div>
                
				<div class="slide" id="main_slide5">
                        <div class="single_img"><img src="images/model/7.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide6">
                        <div class="single_img"><img src="images/model/8.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide7">
                        <div class="single_img"><img src="images/model/9.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide8">
                        <div class="single_img"><img src="images/model/10.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide9">
                        <div class="single_img"><img src="images/model/11.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide10">
                        <div class="single_img"><img src="images/model/12.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide11">
                        <div class="single_img"><img src="images/model/13.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide12">
                        <div class="single_img"><img src="images/model/14.jpg"></div>
				</div>
				
				<div class="slide"  id="main_slide13">
                        <div class="two_img"><img src="images/model/15.jpg"></div><div class="two_img"><img src="images/model/18.jpg"></div>
				</div>
                
				<div class="slide" id="main_slide14">
                        <div class="single_img"><img src="images/model/16.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide15">
                        <div class="single_img"><img src="images/model/17.jpg"></div>
				</div>
				
				<div class="slide" id="main_slide16">
                        <div class="single_img"><img src="images/model/19.jpg"></div>
				</div>
			
			</div>
		    
                <span class="details">height: 5 ft 9(69 in) chest: 32 in  waist: 24 in hips: 35 in dress: 4 shoe: 7</span>

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

            
            </div>
            
            
            <div id="bio">
                <div class="bio_inner">
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
    




            <div id="slider_2">
          <a href="#" class="control_next_2">>></a>
          <a href="#" class="control_prev_2"><</a>
          <div class="slider2">
              <div class="slide2" id="slide1">
                        <img src="images/model/1.jpg" height="90%"><img src="images/model/3.jpg" height="90%">
				</div>
				
				<div class="slide2" id="slide2">
                        <img src="images/model/2.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide3">
                        <img src="images/model/4.jpg" height="100%">
				</div>
				
				<div class="slide2"  id="slide4">
                        <img src="images/model/5.jpg" height="100%"><img src="images/model/6.jpg" height="100%">
				</div>
                
				<div class="slide2" id="slide5">
                        <img src="images/model/7.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide6">
                        <img src="images/model/8.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide7">
                        <img src="images/model/9.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide8">
                        <img src="images/model/10.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide9">
                        <img src="images/model/11.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide10">
                        <img src="images/model/12.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide11">
                        <img src="images/model/13.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide12">
                        <img src="images/model/14.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide13">
                        <img src="images/model/15.jpg" height="100%"><img src="images/model/18.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide14">
                        <img src="images/model/16.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide15">
                        <img src="images/model/17.jpg" height="100%">
				</div>
				
				<div class="slide2" id="slide16">
                        <img src="images/model/19.jpg" height="100%">
				</div>
				







          </div>
        </div>
        </div>
    </body>
</html>
