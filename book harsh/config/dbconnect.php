<?php 
	date_default_timezone_set('Etc/GMT-6');	
	$db = mysqli_connect("localhost","root","", "book");
	if(!($db))
     	trigger_error("Could not connect to the database", E_USER_ERROR);   
    $site_url = 'http://localhost/book harsh';
	define('ROOT_URL', $site_url);
?>