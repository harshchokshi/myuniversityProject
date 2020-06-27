<?php require_once('header.php');
$query = "SELECT * FROM user WHERE user_email='nasrin@gmail.com'";
$result = mysqli_query($db,$query) or die(mysql_error()); 
$post = mysqli_fetch_object($result);
?>
   
<section class="success_header">
     <div class="container">
     		<h1>Post</h1>
     </div>
</section>
<section class="events success">
	<div class="container">
            <div class="inner-content">
                            <div class="row space-margin">
                                <div class="col-md-3 col-sm-12 ad">
                                    <img src="<?php echo $site_url;?>/images/ad1.jpg">
                                    <img src="<?php echo $site_url;?>/images/ad2.jpg">
                                    <img src="<?php echo $site_url;?>/images/ad3.jpg">
                                </div>
                                <!--col-md-3 ends....-->
                                <div class="col-md-9 col-sm-12 dnt-80 ">
                                    <div class="toma-right">
                                      <?php 
									       $query1 = "SELECT * FROM post ORDER BY post_date DESC LIMIT 10";
                                           $result1= mysqli_query($db,$query1) or die(mysql_error()); 
                                           while($post1= mysqli_fetch_object($result1)){ 
										   
										   $query2 = "SELECT * FROM user WHERE user_id=".$post1->user_id;
										   $result2 = mysqli_query($db,$query2) or die(mysql_error()); 
										   $post2 = mysqli_fetch_object($result2);
										   
										   $like_sql = "SELECT * FROM post_like WHERE post_id=".$post1->post_id;
										   $like_result = mysqli_query($db,$like_sql) or die(mysql_error()); 
										   $likes = mysqli_num_rows($like_result);
										   ?>
                                              <div class="row toma-bottom">
                                              
                                               <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" enctype="multipart/form-data">
                                                <div class="col-md-3 col-sm-12 toma-no-padding" style=" padding-left:15px;">
                                                   <img src="<?php echo $site_url;?>/images/star-icon.png" style="width:100%">
                                                </div>
                                                <div class="col-md-9 col-sm-12 toma-no-padding" style="padding-right:15px;">
                                                     <div class="event_row">
                                                          <h2><?php echo $post2->user_name;?></h2>
                                                          <span style="font-size:12px; color:#9400D4; font-weight:bold"><?php echo date('F d, Y',strtotime($post1->post_date)); ?></span>
                                                          <p><?php echo $post1->post_text;?></p>
                                                         
                                                          
                                                     </div>
                                                </div>
                                                </form>
                                                
                                              </div>
                                              <?php
											   }
											   ?>
                                               
                                                <?php if($_POST['like']){
										  
										  $post_id = $_POST['post_id'];
										  $user_id = $post->user_id;
										  $today= date('Y-m-d');
										  
										  $query00= "INSERT INTO post_like(user_id, post_id, like_date) VALUES ($user_id, $post_id, '$today')";
										  
			                              $result00 = mysqli_query($db,$query00) or die(mysql_error());
									  }
									  ?>
                                              
                                             
                                       </div>
                                  </div> 	
                            </div>
                            
     
            </div>
            
    </div>
</section>
    
<?php require_once('footer.php') ;?>