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
	<link href="css/dl-menu.css" rel="stylesheet">	
	<link href="css/insta.css" rel="stylesheet">	
   <script src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
    <?php include('header.php'); ?>
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
                <a href="photographers.php">Back</a><br />
                Photographers<span class="photographer_name"><i>Miguel Angelo - Mumbai</i></span>
            </div>
            <div class="photo_tabs">
                <a href="#" id="editorial_tab">Editorial</a>
                <a href="#" id="beauty_tab">Cover stories</a>
                <a href="#" id="advertising_tab">Men</a>
                <a href="#" id="videos_tab">Videos</a>
                <a href="#" id="bio_tab">Bio</a>
            </div>

            <div id="editorial">
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Lisbon editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Mumbai editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Mumbai editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Lisbon editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_8.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_9.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_10.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_11.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_12.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_13.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/editorial/miguel_14.jpg" class="display" alt="1"><span class="photo_name">Portugal editorial</span></a></div>

            <div id="footer">
                <hr class="footer_top" />
                <div class="footer_menu">
                <ol class="pxmenu">
                    <li>Contact Us</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Careers</li>
                    <li>FAQs</li>
                </ol>
                </div>
                <div class="copyright">© Copyright ANIMA CREATIVES 2014</div>
                <div class="hepta">MADE WITH LOVE BY HEPTA</div>
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

            <div id="footer">
                <hr class="footer_top" />
                <div class="footer_menu">
                <ol class="pxmenu">
                    <li>Contact Us</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Careers</li>
                    <li>FAQs</li>
                </ol>
                </div>
                <div class="copyright">© Copyright ANIMA CREATIVES 2014</div>
                <div class="hepta">MADE WITH LOVE BY HEPTA</div>
            </div>
            </div>
            
            
            <div id="advertising">
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_1.jpg" class="display" alt="1"><span class="photo_name">Men 1</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_2.jpg" class="display" alt="1"><span class="photo_name">Men 2</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_3.jpg" class="display" alt="1"><span class="photo_name">Men 3</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_4.jpg" class="display" alt="1"><span class="photo_name">Men 4</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_5.jpg" class="display" alt="1"><span class="photo_name">Men 5</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_6.jpg" class="display" alt="1"><span class="photo_name">Men 6</span></a></div>
                
                <div class="col-h model_single"><a href="#"><img src="images/photographers/album/men/miguel_7.jpg" class="display" alt="1"><span class="photo_name">Men 7</span></a></div> 
            <div id="footer">
                <hr class="footer_top" />
                <div class="footer_menu">
                <ol class="pxmenu">
                    <li>Contact Us</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Careers</li>
                    <li>FAQs</li>
                </ol>
                </div>
                <div class="copyright">© Copyright ANIMA CREATIVES 2014</div>
                <div class="hepta">MADE WITH LOVE BY HEPTA</div>
            </div>
            </div>
            
            
            <div id="videos">
                <div class="vid">
                <iframe src="//player.vimeo.com/video/111553596"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/41755731"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/11927571"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <iframe src="//player.vimeo.com/video/19457624"  width="50%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>    

            <div id="footer">
                <hr class="footer_top" />
                <div class="footer_menu">
                <ol class="pxmenu">
                    <li>Contact Us</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Careers</li>
                    <li>FAQs</li>
                </ol>
                </div>
                <div class="copyright">© Copyright ANIMA CREATIVES 2014</div>
                <div class="hepta">MADE WITH LOVE BY HEPTA</div>
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
                
                                 
            <div id="footer">
                <hr class="footer_top" />
                <div class="footer_menu">
                <ol class="pxmenu">
                    <li>Contact Us</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Careers</li>
                    <li>FAQs</li>
                </ol>
                </div>
                <div class="copyright">© Copyright ANIMA CREATIVES 2014</div>
                <div class="hepta">MADE WITH LOVE BY HEPTA</div>
            </div>
            </div>
    
        </div>
        
             
    </div>
	
	

	<!--/#scripts--> 
    
    <!--<script type="text/javascript" src="js/jquery.js"></script>-->
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jquery.instastream.js"></script>
    
</body>

</html>