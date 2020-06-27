<?php session_start();
require_once('config/dbconnect.php'); 
 //session_start();


include_once('header.php') ;
?>

<!--banner section starts...-->
    <section class="banner_area">
        <!-- Content Wrapper -->
<?php  if (!isset($_POST['seller']) && !isset($_POST['buyer'])){ ?>    
        <div class="toma">
        
              <div class="header-title">
                      <h3>Login</h3>
              </div>
              
              <div class="login-left">
                 <form action="<?php echo $site_url;?>/index3.php" method="post">
                   <input type="submit" value="As Seller" name="seller" />
                 </form>          
              </div>
              
              
              <div class="login-right">
                 <form action="<?php echo $site_url;?>/index3.php" method="post">
                     <input type="submit" value="As Buyer" name="buyer" />
                   </form> 
              </div>
        
        </div>
        <?php } ?>

          <?php  if (isset($_POST['seller'])){ ?>            
                  <div class="toma top-margin">
                          
                                 <div class="header-title">
            
                                            <h3>Seller Login</h3>
            
            
                                        </div>


            
                                 <!--<p style="color: #ff0000;font-size: 18px;font-weight: 900; text-align: left;"><?php echo $msg;?></p>
            -->
                                <form action="<?php echo $site_url;?>/add_item.php" method="post" class="form-horizontal" id="loginForm">
            
                                    
            
                                        <div>
            
                                            <label class="control-label" for="username">Seller Email</label>
            
                                            <input type="text" required value="" name="seller_email" class="form-control">
            
                                           
            
                                        </div>
            
                                        <div>
            
                                            <label class="control-label" for="operator_password">Password</label>
            
                                            <input type="password" placeholder="******" required value="" name="seller_password" class="form-control">
            
                                           
            
                                        </div>
            
                                        
            
                                        <div style="margin-top:15px;">
            
                                            <input type="submit" value="Login" name="submit8" class="btn btn-primary w-md m-b-5" />
                                            <h3 class="new"><a href="<?php echo $site_url;?>/index1.php"><span class="help-block small" >New? Create Account Now</span></a>    </h3>        
                                        </div>
            
                                    </form>

                 </div>
            <?php
		  }
		  else if (isset($_POST['buyer']))
		  {
			  ?>
                <div class="toma top-margin">
                          
                       <div class="header-title">
                                  <h3>Buyer Login</h3>
                       </div>
               <form action="<?php echo $site_url;?>/item_list.php" method="post" class="form-horizontal" id="loginForm">
            
                                    
            
                                        <div>
            
                                            <label class="control-label" for="username">Buyer Email</label>
            
                                            <input type="text" required value="" name="buyer_email" class="form-control">
            
                                           
            
                                        </div>
            
                                        <div>
            
                                            <label class="control-label" for="operator_password">Password</label>
            
                                            <input type="password" placeholder="******" required value="" name="buyer_password" class="form-control">
            
                                           
            
                                        </div>
            
                                        
            
                                        <div style="margin-top:15px;">
            
                                            <input type="submit" value="Login" name="submit17" class="btn btn-primary w-md m-b-5" />
                                            <h3 class="new"><a href="<?php echo $site_url;?>/index2.php"><span class="help-block small" >New? Create Account Now</span></a>    </h3>
                                           
                                        </div>
            
                                    </form>
                                    
                          </div>
              <?php
		  }
		  ?>
    	
    	<ul class="bxslider">
        	<!--carousel starts here.......-->
            	 <li>
                         <img src="<?php echo $site_url;?>/images/bg1.jpg" alt="Chania">
                        <!--  <div class="carousel-caption container">
             <h2><span>START</span> WHERE YOU ARE.<br><span> USE</span> WHAT YOU HAVE.<br><span> DO</span> WHAT YOU CAN.</h2>
                           
                          </div>-->
                                    
                 </li>
                 <li>
                           <img src="<?php echo $site_url;?>/images/bg2.jpg" alt="Chania">
                         <!-- <div class="carousel-caption container">
          <h2><span>NICE</span> WHERE YOU ARE.<br><span> USE</span> WHATS YOU HAVE.<br><span> DO</span> WHAT ME CAN.</h2>
                        
                          </div>-->
                                    
                </li>
                <li>
                        <img src="<?php echo $site_url;?>/images/bg3.jpg" alt="Chania">
                         <!-- <div class="carousel-caption container">
       <h2><span>WOW</span> WHERE YOU ARE.<br><span> USE</span> WHAT YOU HAVE.<br><span> DO</span> WHAT YOU CAN.</h2>
                       
                          </div>-->
                                    
                </li>
                <li>
                           <img src="<?php echo $site_url;?>/images/bg4.jpg" alt="Chania">
                          <!--<div class="carousel-caption container">
          <h2><span>NICE</span> WHERE YOU ARE.<br><span> USE</span> WHATS YOU HAVE.<br><span> DO</span> WHAT ME CAN.</h2>
                      
                          </div>-->
                                    
                </li>     
         </ul>
         

        <!-- /.content-wrapper --> 

        
    </section>
    <!--banner section ends...-->
    
 

    
<?php require_once('footer.php') ;?>