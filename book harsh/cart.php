<?php  session_start();//require_once('authintication.php');
require_once('config/dbconnect.php');  
require_once('header.php');

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
	
//$item_id = $_GET['item_id'];
//$user_email = $_SESSION["user_email"];
/*$user_email = 'tutor@gmail.com';
$query = "SELECT * FROM user WHERE user_email='$user_email'";
$result = mysqli_query($db,$query);
$post = mysqli_fetch_object($result);


$uri = $_SERVER["REQUEST_URI"];
$uriArray = explode('/', $uri);
$ttt = $uriArray[1];
$pid = $uriArray[3];*/
$uri = $_SERVER["REQUEST_URI"];


$item_id = $_SESSION['item_id'];
$i_name = $_SESSION['item_name'];
$i_price = $_SESSION['item_price'];

$item_sql = "SELECT * FROM item WHERE item_id= $item_id";
$item_result = mysqli_query($db,$item_sql);
$item = mysqli_fetch_object($item_result);
$sold = $item->item_sold;
$sold_now = $sold+1;


$sell_sql = "SELECT * FROM item_sell WHERE buyer_id= $buyer_id";
$sell_result = mysqli_query($db,$sell_sql);
$sell = mysqli_num_rows($sell_result);

/*$query8 = "UPDATE item SET item_sold =".$sold_now." WHERE item_id =".$item_id;
$result8 = mysqli_query($db,$query8) ;

$query88 = "INSERT INTO item_sell (sell_id, item_id, buyer_id) VALUES ('', $item_id, $buyer_id)";
$result88 = mysqli_query($db,$query88) ;*/



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
                                <div class="col-md-12 col-sm-12 " style="margin-top:30px;" >
                                <table border="1" width="100%" class="cart">
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th></th>
                                     <tr>
                                        <td width="30%"><img src="<?php echo $site_url;?>/uploads/item/<?php echo $item->item_image;?>" width="40%"></td>
                                        <td width="30%"><h6 class="price" ><?php echo $item->item_name;?></h6></td>
                                        
                                        <td width="20%"><h6 class="price" >AUD  <?php echo $item->item_price;?></h6></td>
                                        <td width="20%"> 
                                          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                              <input type="hidden" name="cmd" value="_xclick">
                                              <input type="hidden" name="business" value="harsh-store@gmail.com">
                                              <input type="hidden" name="item_name" value="<?php echo $i_name;?>">
                                              <input type="hidden" name="item_number" value="1">
                                              <input type="hidden" name="amount" value="<?php echo $i_price;?>">
                                              <input type="hidden" name="no_shipping" value="0">
                                              <input type="hidden" name="no_note" value="1">
                                              <input type="hidden" name="currency_code" value="AUD">
                                              <input type="hidden" name="lc" value="AU">
                                              <input type="hidden" name="bn" value="PP-BuyNowBF">
                                              <input type="hidden" name="item_id" value="<?php echo $_SESSION['item_id'] = $item_id; ?>">
                                              <input type="hidden" name="buyer_id" value="<?php echo $_SESSION['buyer_id'] = $buyer_id; ?>">
                                              <input type="hidden" name="return" value="<?php echo $site_url;?>/thank_you.php">
                                              <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                                              <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                          </form>
                                        </td>
                                     </tr>
                                 </table>
                                      
                                  
                                   
                                    
                                    
                                </div>
                                <!--col-md-3 ends....-->
                                 	
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