<?php session_start();
require_once('config/dbconnect.php');      
require_once('header.php') ;

	 if (isset($_POST[ 'submit'])){
		 
		    extract($_POST);
		    $image_name = basename($_FILES["image_file"]["name"]);
		    $buyer_name = $_POST['buyer_name'];
		 	$buyer_email = $_POST['buyer_email'];
			$buyer_phone = $_POST['buyer_phone'];
			$buyer_password =  md5($_POST['buyer_password']);
								
			$query11 = "SELECT * FROM buyer WHERE buyer_name='$buyer_name'";
			$result11 = mysqli_query($db,$query11) or die(mysql_error());
			$rows11 = mysqli_num_rows($result11);
			if($rows11>0){
				$msg = "Username Already Exist. Try New One.";
			}
			else
			{
														
			$query = "INSERT INTO buyer(buyer_id, buyer_name, buyer_email, buyer_phone, buyer_image, buyer_password) VALUES ('', '$buyer_name', '$buyer_email', $buyer_phone, '$image_name', '$buyer_password')";
			$result = mysqli_query($db,$query) ;
			
$target_dir = "uploads/buyer/";
$target_file = $target_dir . basename($_FILES["image_file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image_file"]["tmp_name"]);
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
if ($_FILES["image_file"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image_file"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

				
				if($result){
					?>
				<script>
				    window.location = "<?php echo $site_url;?>/index3.php/";
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
}
 

 ?>   
<!--banner section starts...-->

 <section class="banner_area">
        <!-- Content Wrapper -->

                    <div class="toma top-margin width-70">
                          
                                 <div class="header-title">
            
                                            <h3>Buyer Registration</h3>
            
            
                                        </div>


            
                                <!-- <p style="color: #ff0000;font-size: 18px;font-weight: 900; text-align: left;"><?php echo $msg;?></p>-->
            
                               <form action="<?php echo $site_url;?>/index2.php" method="post" class="form-horizontal" enctype="multipart/form-data" id="loginForm">
            
                                    
                              <div class="col-md-6">
                                        <div>
                                            <label class="control-label" for="username">Name</label>
                                            <input type="text" required value="" name="buyer_name" class="form-control">            
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="username">Email</label>
                                            <input type="email" required value="" name="buyer_email" class="form-control">            
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="username">Phone</label>
                                            <input type="tel" required value="" name="buyer_phone" class="form-control">            
                                        </div>
                                        
                               </div>
                               <div class="col-md-6">
                               
                                        
                                       <div>
                                            <label class="control-label" for="username">User Photo</label>
                                            <input type="file" name="image_file" id="image_file">
                                                      
                                        </div>
            
                                        <div>
                                            <label class="control-label" for="operator_password">Password</label>
                                            <input type="password" placeholder="******" id="txtPassword" required value="" name="buyer_password" class="form-control">
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="operator_password">Confirm Password</label>
                                            <input type="password" placeholder="******" id="txtCPassword" required value="" name="buyer_password" class="form-control" onkeyup="checkPasswordMatch();">
                                             <span class="registrationFormAlert" id="divCheckPasswordMatch"></span>
                                        </div>
            
                                        
            
                                        <div style="margin-top:15px;">
            
                                            <input type="submit" value="Register" name="submit" class="btn btn-primary w-md m-b-5" />                                        
                                        </div>
                                </div>
                                <br><br><h3 class="new"><a href="<?php echo $site_url;?>/index3.php"><span class="help-block small" >Have Account? Login Now</span></a></h3>
            
                          </form>
                 </div>
    	
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
    
    

<script type="text/javascript"><!--
function checkPasswordMatch() {
    var password = $("#txtPassword").val();
    var confirmPassword = $("#txtCPassword").val();

   if (password != confirmPassword)
	   {
	    $("#activateAccountButton").attr("disabled","disabled");
        $("#divCheckPasswordMatch").html("<h4 style='color: red; font-size: 16px; font-weight: bold;'>Passwords do not match!</h4>");
	   }
	 else
	 {
	    $("#activateAccountButton").removeAttr("disabled"); 
        $("#divCheckPasswordMatch").html("<h4 style='color: #00f500; font-size: 16px; font-weight: bold;'>Passwords match.</h4>");
	 }
    
}
//--></script>
    
<?php require_once('footer.php') ;?>