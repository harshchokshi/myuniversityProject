<?php 
require_once('config/dbconnect.php');
$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
if($delete_coffee=mysqli_query($db,"DELETE FROM item WHERE item_id =".$id))
{
	$item = mysqli_fetch_object($delete_coffee);
	$delete = mysqli_query($db,"DELETE FROM item_feedback WHERE item_id =".$item->item_id);
	?>
	<script>
	    alert('Delete successfully');
		window.location = "<?php echo $site_url;?>/item_list.php/";
	</script>
	
    <?php
}else{
	?>
	<script>
	    alert('Failed to delete');
		window.location = "<?php echo $site_url;?>/item_list.php/";
	</script>
	
    <?php
	
}
?>