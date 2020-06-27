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

$item_id = $_SESSION['item_id'];
$buyer_id = $_SESSION['buyer_id'];

$item_sql = "SELECT * FROM item WHERE item_id= $item_id";
$item_result = mysqli_query($db,$item_sql);
$item = mysqli_fetch_object($item_result);
$sold = $item->item_sold;
$sold_now = $sold+1;


$sell_sql = "SELECT * FROM item_sell WHERE buyer_id= $buyer_id";
$sell_result = mysqli_query($db,$sell_sql);
$sell = mysqli_num_rows($sell_result);

$query8 = "UPDATE item SET item_sold =".$sold_now." WHERE item_id =".$item_id;
$result8 = mysqli_query($db,$query8) ;

$query88 = "INSERT INTO item_sell (sell_id, item_id, buyer_id) VALUES ('', $item_id, $buyer_id)";
$result88 = mysqli_query($db,$query88) ;

?>

                            <script>
							alert("Thank you. Your payment is done successfully!!");
							</script>
                            <?php  header("Location: http://localhost/book harsh/item_details.php?item_id=".$item_id."&&buyer_id=".$buyer_id); 
							?>