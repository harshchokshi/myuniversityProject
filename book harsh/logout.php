<?php session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
$_SESSION["seller_email"] = '';
unset($_SESSION["seller_email"]);
header("Location: http://localhost/book harsh/");
}
?>