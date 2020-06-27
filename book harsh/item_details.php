<?php  session_start();//require_once('authintication.php');
require_once('config/dbconnect.php');  

$item_id = $_GET['item_id'];
if(isset($_SESSION["seller_email"]))
{
	$seller_email = $_SESSION["seller_email"];
	$query11 = "SELECT * FROM seller WHERE seller_email='$seller_email'";
	$result11 = mysqli_query($db,$query11) or die(mysql_error());
	$rows11 = mysqli_fetch_object($result11);
	$seller_id = $rows11->seller_id;
	}
if(isset($_SESSION["buyer_email"]))
{
	$buyer_email = $_SESSION["buyer_email"];
	$query14 = "SELECT * FROM buyer WHERE buyer_email='$buyer_email'";
	$result14 = mysqli_query($db,$query14) ;
	$rows14 = mysqli_fetch_object($result14);
	$buyer_id = $rows14->buyer_id;
	
	$sell_sql = "SELECT * FROM item_sell WHERE buyer_id= $buyer_id && item_id = ".$item_id;
    $sell_result = mysqli_query($db,$sell_sql);
    $sell = mysqli_num_rows($sell_result);
	}
	
if(isset($_GET["buyer_id"]))
{
	
	$buyer_id = $_GET["buyer_id"];
	
	$sell_sql = "SELECT * FROM item_sell WHERE buyer_id= $buyer_id && item_id = ".$item_id;
    $sell_result = mysqli_query($db,$sell_sql);
    $sell = mysqli_num_rows($sell_result);
	}
	

$uri = $_SERVER["REQUEST_URI"];

$item_sql = "SELECT * FROM item WHERE item_id= $item_id";
$item_result = mysqli_query($db,$item_sql);
$item = mysqli_fetch_object($item_result);



$_SESSION['item_id'] = $item->item_id;
$_SESSION['item_name'] = $item->item_name;
$_SESSION['item_price'] = $item->item_price;

require_once('header.php');
?>
   
<section class="success_header">
     <div class="container">
     		<h1><?php echo $item->item_name;?></h1>
     </div>
</section>
<section class="events success">
	<div class="container">
            <div class="inner-content">
                            <div class="row space-margin" style="background:#fff">
                                <div class="col-md-5 col-sm-12 " style="margin-top:30px;" >
                                    <img src="<?php echo $site_url;?>/uploads/item/<?php echo $item->item_image;?>" width="100%"><br><br><br>
                                    
                                    <?php if(isset($_SESSION["buyer_email"]) || isset($_GET['buyer_id'])){
										if($sell==0){?>
                                    <h6 class="price"><a href="<?php echo $site_url;?>/cart.php" class="details">Buy Now</a></h6>
                                    <?php
									}
									else
									{
									?>
                                    <h6 class="price"><a target="_blank" href="<?php echo $site_url;?>/uploads/item/<?php echo $item->item_file;?>" class="details" download>Download</a></h6>
                                    <?php
									}
									}
									?>
                                </div>
                                <!--col-md-3 ends....-->
								
                                <div class="col-md-7 col-sm-12 " style="padding-left:0px;">
                                <div class="row">
                                   <div class="event_row">
                                    <!--Full Item Details with Feedback text box....-->
                                        <h2><?php echo $item->item_name;?></h2>
                                        
                                        <h6 class="price" ><span class="left">AUD  <?php echo $item->item_price;?></span><span class="right"><?php echo $item->item_sell_type;?></span></h6><br><br>
                                        <p style="clear:both;margin-top:20px;"><h5><strong>Description : </strong></h5><?php echo $item->item_desc;?></p>
                                        <h5><strong>Feedback : </strong></h5>
                                        <form action="<?php echo $uri; ?>" method="post" style="margin-bottom:10px">
                                            <textarea name="feedback" ></textarea>
                                            <input type="submit" name="feedback-submit" value="Post" />
                                        </form>
                                        
                                        <?php if(isset($_POST['feedback-submit'])){
											$feedback_text = $_POST['feedback'];
											$id = $item->item_id;
											
											if($seller_id == 0){
											$feed = "INSERT INTO item_feedback (feedback_id, item_id, seller_id, buyer_id, feedback_text) VALUES ('', $id, '', $buyer_id, '$feedback_text')";
											}
											if($buyer_id == 0){
												$feed = "INSERT INTO item_feedback (feedback_id, item_id, seller_id, buyer_id, feedback_text) VALUES ('', $id, $seller_id, '', '$feedback_text')";
											}
											
											$i_result = mysqli_query($db,$feed);
											
										}?>
                                        
                                        <?php /*$rate = $rating;
										$no_rate = 5-$rate;
										for($i=1;$i<=$rate;$i++)
										{
											?>
                                            <img src="<?php echo $site_url;?>/images/rating2.png">
                                            <?php
										}
										for($i=1;$i<=$no_rate;$i++)
										{
											?>
                                            <img src="<?php echo $site_url;?>/images/rating1.png">
                                            <?php
										}*/
										?>
                                    
                                   </div>
                                </div>
                                </div> 	
                            </div>
                            
                           
                
                            <div class="row space-margin">
                               
                                <!--col-md-3 ends....-->
                                <div class="col-md-12 col-sm-12 ">
                                     <h2 style="color:#fff; padding:8px 12px;">FEEDBACk</h2>
                                      <?php 
									       $query1 = "SELECT * FROM item_feedback WHERE item_id=$item_id ORDER BY feedback_id DESC";
                                           $result1= mysqli_query($db,$query1); 
                                           while($post1= mysqli_fetch_object($result1)){ 
										   
										   if($post1->seller_id !=0){
											  $seller = "SELECT * FROM seller WHERE seller_id=".$post1->seller_id;
										      $seller_connect = mysqli_query($db,$seller); 
										      $seller_result = mysqli_fetch_object($seller_connect);
											  ?>
											  
											  <div class="row toma-bottom">
                                                <div class="col-md-2 col-sm-12 toma-no-padding" style="padding: 0; padding-left:15px;">
                                                   <img src="<?php echo $site_url;?>/uploads/seller/<?php echo $seller_result->seller_image;?>" width="100%">
                                                </div>
                                                <div class="col-md-10 col-sm-12 toma-no-padding" style="padding-right:15px;">
                                                     <div class="event_row">
                                                     
                                                         <h4> <strong><?php echo $seller_result->seller_name;?></strong><span class="cate">( Seller )</span></h4>
                                                          
                                                         
                                                          <p><?php echo $post1->feedback_text;?></p>
                                                           <?php /*$rate1 = $post3->rating;
															$no_rate1 = 5-$rate1;
															for($i=1;$i<=$rate1;$i++)
															{
																?>
																<img src="<?php echo $site_url;?>/images/rating2.png">
																<?php
															}
															for($i=1;$i<=$no_rate1;$i++)
															{
																?>
																<img src="<?php echo $site_url;?>/images/rating1.png">
																<?php
															}*/
										  
															?>
                                       </div>
                                  </div> 	
                            </div>
                            <?php
										   }
										   
										   if($post1->buyer_id !=0){
										   $buyer = "SELECT * FROM buyer WHERE buyer_id=".$post1->buyer_id;
										   $buyer_connect = mysqli_query($db,$buyer); 
										   $buyer_result = mysqli_fetch_object($buyer_connect);
										  
										   
										 
										   
										   
										   ?>
                                              <div class="row toma-bottom">
                                              
                                              
                                                <div class="col-md-2 col-sm-12 toma-no-padding" style="padding: 0; padding-left:15px;">
                                                   <img src="<?php echo $site_url;?>/uploads/buyer/<?php echo $buyer_result->buyer_image;?>" width="100%">
                                                </div>
                                                <div class="col-md-10 col-sm-12 toma-no-padding" style="padding-right:15px;">
                                                     <div class="event_row">
                                                     
                                                          <h4><strong><?php echo $buyer_result->buyer_name;?></strong><span class="cate">( Buyer )</span></h4>
                                                          
                                                         
                                                          <p><?php echo $post1->feedback_text;?></p>
                                                           
                                                 </div>
                                            </div> 	
                                      </div>
                                      <?php
										   }
										 }
										   ?>
            </div>
            
    </div>
</section>

<script type="text/javascript">
function delete_data(id)
 	{ 
		var $p = '<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure to delete selected Content?</p>'; 
		var $dialog = $('<div></div>')
						.html($p)
						.dialog({
								resizable: false,
								autoOpen: false,
								title: 'Confirmation',								
								modal: true,
								
								
								buttons: {
											'No' : function(){
												$(this).dialog('close');
											},
											'Yes' : function(){
												$(this).dialog('close');
												$.ajax({
													//alert('ooooo');	
													type: "POST",
													   url: "<?php echo $site_url; ?>/delete_post.php?id="+id,
													   success: function(data){		
															window.location="<?php echo $site_url; ?>/delete_post.php?msg=success";
													   },
													   error : function(data){
														  window.location="<?php echo $site_url; ?>/delete_post.php?msg=error";
													   }			   		
											   });	 								
											}											
										}
						});
						$dialog.dialog('open');
 	}
</script>


<script>
// When the user clicks on <div>, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
    
<?php require_once('footer.php') ;?>