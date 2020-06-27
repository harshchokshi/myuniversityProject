<?php session_start();
require_once('config/dbconnect.php');  
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
	}
	

//$_SESSION["user_email"] = $_SESSION["user_email"];
  
require_once('header.php');
?>

<section class="success_header">
     <div class="container">
     		<h1>Books</h1>
     </div>
</section>
<section class="events success book-list">
	<div class="container">
            <div class="inner-content">
                            <div class="row space-margin">
                                
                                <!--col-md-3 ends....-->
                                <div class="col-md-12 col-sm-12">
                                
                                        <div class="row toma-bottom">
                                      <?php 
									  
									  
									   if(isset($_SESSION["seller_email"]) != ''){
										   
									       $query1 = "SELECT * FROM item WHERE seller_id = $seller_id && item_type ='Book' ORDER BY item_name ASC";
                                           $result1= mysqli_query($db,$query1) ; 
                                           while($post1= mysqli_fetch_object($result1)){ 
										   
										      if(($post1->item_sell_type == "Multi-Sell") || ($post1->item_sell_type == "Single Sell" && $post1->item_sold==0)){
										   
										   ?>
                                             
                                             
                                                <div class="col-md-4 col-sm-4 toma-no-padding" style=" padding-left:15px;">
                                                   
                                                   
                                                        <span style="float:right; position:relative; top: 30px;"><a onclick="delete_data1(<?php echo $post1->item_id;?>)" class="btn btn-danger  btn-sm" data-toggle="tooltip" data-placement="left" title="Delete">X</a></span>
                                                       
                                                       <a href="<?php echo $site_url;?>/item_details.php?item_id=<?php echo $post1->item_id;?>"><img src="<?php echo $site_url;?>/uploads/item/<?php echo $post1->item_image;?>" width="298px" height="220px">                                        <h4><?php echo $post1->item_name;?></h4></a>
                                                  
                                                </div>
                                               
                                              <?php
											   }
											 }
									   }
											  
                                               
                                                if(isset($_SESSION["buyer_email"]) != '')
												   {
													   
													   $query10 = "SELECT * FROM item WHERE item_type ='Book'  ORDER BY item_name ASC";
                                           $result10= mysqli_query($db,$query10) ; 
                                           while($post10= mysqli_fetch_object($result10)){ 
										   
										   if(($post10->item_sell_type == "Multi-Sell") || ($post10->item_sell_type == "Single Sell" && $post10->item_sold==0)){
										   
										   
										   ?>
                                             
                                              
                                              <!-- <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" enctype="multipart/form-data">-->
                                                <div class="col-md-4 col-sm-4 toma-no-padding" style=" padding-left:15px;">
                                                
                                                   <a href="<?php echo $site_url;?>/item_details.php?item_id=<?php echo $post10->item_id;?>"><img src="<?php echo $site_url;?>/uploads/item/<?php echo $post10->item_image;?>" width="298px" height="220px">                                    <h4><?php echo $post10->item_name;?></h4></a>
                                                   <h6 class="price">AUD  <?php echo $post10->item_price;?></h6>
                                                   
                                                 </div>
                                                    <?php
												    }
										   }
												   }
												   ?>
                                                   
                                              </div>    
                                             
                                             
                                  </div> 	
                            </div>
                            
     
            </div>
            
    </div>
</section>


<script type="text/javascript">
function delete_data1(id)
 	{ 
		var $p = '<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure to delete selected Content?</p>'; 
		alert("Delete selected Content?");
		$.ajax({
													//alert('ooooo');	
													   type: "POST",
													   url: "<?php echo $site_url; ?>/delete_item.php?id="+id,
													   success: function(data){		
															window.location="<?php echo $site_url; ?>/delete_item.php?msg=success";
													   },
													   error : function(data){
														  window.location="<?php echo $site_url; ?>/delete_item.php?msg=error";
													   }			   		
											   });	 
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
    
<?php require_once('footer.php') ;?>