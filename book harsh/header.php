<?php //session_start();
//require_once('authintication.php'); 
?>
<!doctype html>
<html lang="en-US">
<head>
<title>Friends e-Book</title>
<meta charset="utf-8">
<!-- Meta -->
<meta name="keywords" content="Coffee Review" />
<meta name="description" content="Coffee Review" />
<meta name="author" content="Nasrin">
<!-- Responsive View  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $site_url;?>/images/favicon.png">
<!-- FONT awesome STYLES -->
<link rel="stylesheet" href="<?php echo $site_url;?>/css/font-awesome.min.css" type="text/css" />
<!-- BOOTSTRAP STYLES -->
<link rel="stylesheet" href="<?php echo $site_url;?>/css/bootstrap.css" type="text/css" />
<!-- Menu CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>/css/menu.css" media="all" />
<!--slider-->
<link rel="stylesheet" media="all" href="<?php echo $site_url;?>/css/jquery.bxslider.css" type="text/css">
<!-- fancyBox main CSS files -->
<link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>/css/jquery.fancybox.css?v=2.1.5" media="screen" />
<!--fonts-->
<link rel="stylesheet" href="<?php echo $site_url;?>/fonts/fonts.css" type="text/css" />
<!-- CSS STYLES -->
<link rel="stylesheet" href="<?php echo $site_url;?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $site_url;?>/css/template.css" type="text/css" />
<!-- Responsive Devices Styles -->
<link rel="stylesheet" media="screen" href="<?php echo $site_url;?>/css/responsive-leyouts.css" type="text/css" />
<!-- **** JS(Java Script) FILES****** --> 
<!-- Lib -->
<script type="text/javascript" src="<?php echo $site_url;?>/js/jquery-1.10.1.min.js"></script>
<!-- BOOTSTRAP js -->
<script type="text/javascript" src="<?php echo $site_url;?>/js/bootstrap.js"></script>
<!-- Menu JS -->
<script type="text/javascript" src="<?php echo $site_url;?>/js/menu-responsive.js"></script>
<!-- bx JS -->
<script type="text/javascript" src="<?php echo $site_url;?>/js/jquery.bxslider.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.bxslider2').bxSlider();
	});
	$(document).ready(function(){
	  $('.bxslider3').bxSlider();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.bxslider').bxSlider();
	});
</script>
<!-- write script to toggle class on scroll -->
<script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});
</script>
<script type="text/javascript" src="<?php echo $site_url;?>/html5lightbox/html5lightbox.js"></script>

</head>
<body>
    <header>
    	<div class="row">
        	<div class="container-fauld" style="width:1370px;">
              <div class="col-md-12" style="width:1170px;    margin: 15px 100px;">
                                 
                      <div class="col-md-6">
                          <div class="logo_area">
                           
                            <a href="<?php echo $site_url;?>/"><img src="<?php echo $site_url;?>/images/logo.png" alt="logo" width="220px"></a>
						   
                          </div>
                          <!--logo_area ends...-->
                      </div>
                      <div class="col-md-6">
                          <div class="contact">
                             <span><i class="fa fa-envelope" aria-hidden="true"></i>  info@friendsebook.com</span><br>
                             <span><i class="fa fa-phone" aria-hidden="true"></i>  +56 567 4597</span><br><br>
                             <span>
                                 <form action="<?php echo $site_url;?>/search.php" method="post" class="search" />
                                    <input type="text" name="search" value="" placeholder="Search by item name" />
                                    <input type="submit" name="submit" value="Search" />
                                 </form>
                             </span>
                          </div>
                      </div>            
      
                      <!--col-md-3 ends...-->  
                       
                 </div> 
                 <div class="col-md-12" style="background:#1667b8; "> 
                   <div style="width:1170px; margin:0 auto;">  
                      <div class="col-md-3">
                      &nbsp;
                      </div>  
                      <!-- Horizontal Navigation Bar -->      
                      <div class="col-md-9">
                              <div class="nav dnt3-menu">
                                  <ul class="dropdown clear" style="    padding-left: px;">
                                  

                                     
                                     <?php /*?> <li><?php if(isset($_SESSION["seller_email"])){echo $seller = $_SESSION["seller_email"];} ?></li>
                                      <li><?php if(isset($_SESSION["buyer_email"])){echo $buyer = $_SESSION["buyer_email"]; }?></li><?php */?>
                                      <?php 
                                       if(isset($_SESSION["seller_email"])=='' && isset($_SESSION["buyer_email"])=='' && isset($_GET["buyer_id"])==''){ 
                                      
                                      ?>
									    <!-- Home Page Navigation Bar -->     
                                       <li><a href="<?php echo $site_url;?>/index.php" >HOME</a></li>
                                       <li ><a href="<?php echo $site_url;?>/about.php">ABOUT COMPANY</a></li>
                                       <li class="last"><a href="<?php echo $site_url;?>/index3.php">SIGNUP / SIGNIN </a></li>
                                       
                                       <?php }
									   if(isset($_SESSION["seller_email"])){ ?>
                                       <!-- Seller Page Navigation Bar -->  
                                       <li><a href="<?php echo $site_url;?>/index2.php">HOME</a></li>
                                       <li><a href="<?php echo $site_url;?>/about.php">ABOUT COMPANY</a></li>
                                       <li><a href="<?php echo $site_url;?>/add_item.php">ADD NEW ITEM </a></li>
                                       <li><a href="<?php echo $site_url;?>/book_list.php">BOOKS </a></li>
                                       <li><a href="<?php echo $site_url;?>/item_list.php">STUDY METARIALS</a></li>
                                       <li class="last"><a href="<?php echo $site_url; ?>/logout.php/"><i class="pe-7s-key"></i> Logout</a></li>
									   <?php
                                       }
									   if(isset($_SESSION["buyer_email"]) || isset($_GET["buyer_id"]))
									   { 
                                      ?>
									    <!-- Buyer Page Navigation Bar -->  
                                       <li><a href="<?php echo $site_url;?>/">HOME</a></li>
                                       <li><a href="<?php echo $site_url;?>/about.php">ABOUT COMPANY</a></li>
                                       <li><a href="<?php echo $site_url;?>/book_list.php">BOOKS </a></li>
                                       <li><a href="<?php echo $site_url;?>/item_list.php">STUDY METARIALS</a></li>
                                       <li class="last"><a href="<?php echo $site_url; ?>/logout1.php/"><i class="pe-7s-key"></i> Logout</a></li>
                                      <?php
									   }
									   ?>
                                  </ul>
                               </div>
                          <!--menu_area ends...-->
                      </div>
                    </div>
                <!--col-md-8 ends...-->
                 
            </div>
            
           </div>
        </div>
    </header>
    <!--header ends..-->