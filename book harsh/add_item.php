<?php session_start();
require_once('config/dbconnect.php');


	
if (isset($_POST['submit8'])){
		 	$seller_email = $_POST['seller_email'];
			$seller_password = md5($_POST['seller_password']);
			$query = "SELECT * FROM seller WHERE seller_email='$seller_email' && seller_password='$seller_password'";
			$result = mysqli_query($db,$query);
			$seller_result = mysqli_fetch_object($result);
			$rows = mysqli_num_rows($result);
				if($rows>0){
				$_SESSION["seller_email"]= $seller_email;
				
				
				 }else{
					 ?>
                     <script>
					 alert('Seller email / password is incorrect.');
					 </script>
                     <?php
					 header("Location: http://www.localhost/index3.php");
			
			}
}

if(isset($_SESSION["seller_email"]))
{
	$seller_email = $_SESSION["seller_email"];
	$query11 = "SELECT * FROM seller WHERE seller_email='$seller_email'";
	$result11 = mysqli_query($db,$query11) or die(mysql_error());
	$rows11 = mysqli_fetch_object($result11);
 $seller_id = $rows11->seller_id;
	}


    
	 if (isset($_POST['submit'])){
		 
		    extract($_POST);
		    $image_name = basename($_FILES["item_image"]["name"]);
			$item_file = basename($_FILES["item_file"]["name"]);
		    $item_type = $_POST['item_type'];
		 	$item_name = $_POST['item_name'];			
			$item_desc = $_POST['item_desc'];
		 	$item_price = $_POST['item_price'];
			$item_sell_type = $_POST['item_sell_type'];
											
			$query = "INSERT INTO item(item_id, seller_id, item_type, item_name, item_image, item_file, item_desc, item_price, item_sell_type, item_sold) VALUES ('', $seller_id, '$item_type', '$item_name', '$image_name', '$item_file', '$item_desc', $item_price, '$item_sell_type', '')";
			$result = mysqli_query($db,$query) ;
			
$target_dir = "uploads/item/";
$target_file = $target_dir . basename($_FILES["item_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["item_image"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["item_image"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["item_image"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

//file upload

$filename1 = $_FILES["item_file"]["name"];
$dir = "uploads/item/".$filename1;     
move_uploaded_file($_FILES["item_file"]["tmp_name"], $dir); 

			
				if($result){
					?>
				<script>
				    window.location = "<?php echo $site_url;?>/item_list.php";
				</script>
                <?php
				 }else{
					 ?>
                     <script>
					 alert('Invalied Values.');
					 </script>
			<?php
			}
     }
	 require_once('header.php') ; 
 ?>  
  
<section class="success_header">
     <div class="container">
     		<h1>Add Book / Study Material</h1>
     </div>
</section>
<section class="events success">
	<div class="container">
            <div class="inner-content add-coffee">
                            <div class="row space-margin">
                                
                                <!--col-md-3 ends....-->
                                <div class="col-md-12 col-sm-12">
                                        
                                
                                        <div class="row">
                                         
                                      <form action="<?php echo $site_url;?>/add_item.php" method="post" class="form-horizontal" enctype="multipart/form-data" id="loginForm">
            
                                    
                                   <div class="col-md-6 col-sm-6">
                                        <div>
                                            <label class="control-label" for="username">Book / Study Material Name</label>
                                            <input type="text" required value="" name="item_name" class="form-control" required>            
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="username">Type</label>
                                            <select name="item_type" required>
                                               <option value="Book">Book</option>
                                               <option value="Image">Image</option>
                                               <option value="Document">Document</option>
                                            </select>
                                                       
                                        </div>
                                        
                                       <div>
                                            <label class="control-label" for="username">Image</label>
                                            <input type="file" name="item_image" id="fileToUpload">
                                                      
                                        </div>
                                        
                                       <div>
                                            <label class="control-label" for="username">File</label>
                                            <input type="file" name="item_file" id="item_file" required>
                                                      
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                    
                                        <div>
                                            <label class="control-label" for="username">Selling Type</label>
                                            <select name="item_sell_type" required>
                                               <option value="Single Sell">Single Sell</option>
                                               <option value="Multi-Sell">Multi-Sell</option>
                                               
                                            </select>
                                                       
                                        </div>
                                    
                                        <div>
                                            <label class="control-label" for="username">Price</label>
                                            <input type="text" required value="" name="item_price" class="form-control">            
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="username">Description</label>
                                            <textarea name="item_desc" class="form-control"></textarea>
                                                    
                                        </div>
                                        
                                     </div>
            
                                        <div style="margin-top:15px;">
                                            <input type="submit" value="Add Item" name="submit" class="btn btn-primary w-md m-b-5" />
                                        </div>
            
                                    </form>
                                              </div>    
                                             
                                             
                                  </div> 	
                            </div>
                            
     
            </div>
            
    </div>
</section>
    
<?php require_once('footer.php') ;?>