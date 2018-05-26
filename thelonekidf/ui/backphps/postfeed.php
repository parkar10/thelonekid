<?php

require_once('remote.php');
//if(isset($_POST["register"])&&isset($_SESSION["name"]))
if(isset($_POST["postBtn"]))
{
session_start();
$email	=$_SESSION["user"];
	date_default_timezone_set("Asia/Kolkata");	
$postTitle 	= $_POST["postTitle"];
$post 	=$_POST["postContent"];
$date	=date("y-m-d h:i:s");
$privacy=$_POST["privacy"];


$stat=$conn->prepare("INSERT INTO `posts`(`email`, `postTitle`, `post`, `date`, `privacy`) VALUES (?,?,?,?,?)");

$stat->bind_param("sssss", $email , $postTitle, $post , $date , $privacy);
$s=$stat->execute();
var_dump($stat);
		if($s)
		{
			echo "posted successfully";
			header("location:../timeline.php");
			die();
		}
}
else
{
	echo "please login";
}
 error_reporting(0); 	
?>