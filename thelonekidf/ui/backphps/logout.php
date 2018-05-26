<?php 
session_start();
session_destroy();
header('Location: ../indexpage.php');
exit();
 error_reporting(0); 	
?>