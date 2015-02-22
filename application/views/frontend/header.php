<center><a href="<?php echo base_url("frontend")."/";?>index.php"><img class="logo" src="<?php echo base_url("frontend")."/";?>images/logo.png" alt="logo"></a></center>
<header class="menu">
        <ul>
        <?php 
            $catmodels= $this->category_model->getall();
            $catcreativeartists = $this->photographercategory_model->getcreativeartistscategory();
        ?>
        <li><a href="#" id="model">Models</a>
            <ul class="">
               <?php foreach($catmodels as $catmodel) {?> <li><a href="<?php echo site_url("website/models?id=").$catmodel->id;?>"><?php echo $catmodel->name;?></a></li> <?php } ?>
            </ul>
        </li>
        <li><a href="#">Creative Artists</a>
            <ul class="">
               <?php foreach($catcreativeartists as $catartist) {?> <li><a href="<?php echo site_url("website/creativeartists?id=").$catartist->id."&name=".$catartist->name;?>"><?php echo $catartist->name;?></a></li> <?php } ?>
            </ul>
        </li>
        <li><a href="#">Agency</a>
            <ul class="">
                <li><a href="<?php echo site_url("website/about");?>">About Us</a></li>
                <li><a href="<?php echo site_url("website/become_model");?>">Become A Model</a></li>
                <li><a href="<?php echo site_url("website/contact");?>">Contact Us</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url("website/news");?>">News</a></li>
        </ul>
    </header>


<div id="dl-menu" class="dl-menuwrapper">
		<a href="<?php echo base_url("frontend")."/";?>index.php"><div class="mobile_logo"></div></a>
        				
       <div class="dl-trigger menu_click"></div>
						<ul class="dl-menu">
							<li>
								<a href="#">Models</a>
								<ul class="dl-submenu">
								    <li><a href="females_in_town.php">Female In Town</a></li>
                                    <li><a href="#">Female Out of Town</a></li>
                                    <li><a href="#">Male In Town</a></li>
                                    <li><a href="#">Male Out of Town</a></li>
                                </ul>
							</li>
                            <li><a href="#">Creative Artists</a>
                                        <ul class="dl-submenu">
                                            <li><a href="photographers.php">Photographers</a></li>
                                            <li><a href="hair_makeup.php">Hair &amp; Make-up Artists</a></li>
                                            <li><a href="hair_stylists.php">Hair Stylists</a></li>
                                            <li><a href="stylists.php">Stylists</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Agency</a>
                                        <ul class="dl-submenu">
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="become_model.php">Become A Model</a></li>
                                            <li><a href="contact.php">Contact Us</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="news.php">News</a></li>
                            </ul>
					</div>

  
  