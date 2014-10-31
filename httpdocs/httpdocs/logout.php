<?php 
session_start();
unset($_SESSION['uid']);
unset($_SESSION['session_id']);
unset($_SESSION['order_id']);
//setcookie("PHPSESSID","",time()-3600,"/");
header('location:login.php');
?>