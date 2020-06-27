<?php session_start();
require_once('config/dbconnect.php'); 
 //session_start();

include_once('header.php') ;
?>

<!--banner section starts...-->
    <section class="banner_area">
        <!-- Content Wrapper -->

    	
    	<ul class="bxslider">
        	<!--carousel starts here.......-->
            	 <li>
                         <img src="<?php echo $site_url;?>/images/bg1.jpg" alt="Chania">
                          <div class="carousel-caption container">
             <h2><span>START</span> WHERE YOU ARE.<span> USE</span> WHAT YOU HAVE.<br><span> DO</span> WHAT YOU CAN.</h2>
                           
                          </div>
                                    
                 </li>
                 <li>
                           <img src="<?php echo $site_url;?>/images/bg2.jpg" alt="Chania">
                          <div class="carousel-caption container">
          <h2><span>NICE</span> WHERE YOU ARE.<span> USE</span> WHATS YOU HAVE.<br><span> DO</span> WHAT ME CAN.</h2>
                        
                          </div>
                                    
                </li>
                <li>
                        <img src="<?php echo $site_url;?>/images/bg3.jpg" alt="Chania">
                          <div class="carousel-caption container">
       <h2><span>WOW</span> WHERE YOU ARE.<span> USE</span> WHAT YOU HAVE.<br><span> DO</span> WHAT YOU CAN.</h2>
                       
                          </div>
                                    
                </li>
                <li>
                           <img src="<?php echo $site_url;?>/images/bg4.jpg" alt="Chania">
                          <div class="carousel-caption container">
          <h2><span>NICE</span> WHERE YOU ARE.<span> USE</span> WHATS YOU HAVE.<br><span> DO</span> WHAT ME CAN.</h2>
                      
                          </div>
                                    
                </li>     
         </ul>
         

        <!-- /.content-wrapper --> 

        
    </section>
    <!--banner section ends...-->
    
 

    
<?php require_once('footer.php') ;?>