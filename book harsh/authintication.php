<?php //session_start();
//require_once('config/dbconnect.php'); 
	if(!isset($_SESSION["user_email"])){
		session_destroy();
	header("Location: http://localhost/book harsh");
	//exit(); 
	
	}
?>