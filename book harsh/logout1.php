<?php session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
$_SESSION["buyer_email"] = '';
unset($_SESSION["buyer_email"]);
header("Location: http://localhost/book harsh/");
}
?>