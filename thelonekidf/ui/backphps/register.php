<?php
 error_reporting(0); 	
require_once('remote.php');
if(isset($_POST["register"]))
{
$name	=$_POST["name"];
$name	=ucwords($name);
$email	=$_POST["remail"];
$pwd 	=$_POST["rpwd"];
$dob	=$_POST["dob"];
$gender	=$_POST["gender"];
$city	=$_POST["city"];
$city	=ucwords($city);
date_default_timezone_set("Asia/Kolkata");
$dateTime=date("y-m-d h:i:s");
/*
echo $email ."<br>"  ;
echo $pwd."<br>" ;
echo $dob ."<br>"  ;
echo $gender."<br>";
echo $name ."<br>"  ;
echo $city ."<br>"  ;
echo $dateTime;
*/
$stat=$conn->prepare("INSERT INTO `users`(`name`, `email`, `password`, `dob`, `gender`, `city`,`dateTime`)
 VALUES (?,?,?,?,?,?,?)");
$stat->bind_param("sssssss",$name , $email , $pwd , $dob , $gender , $city, $dateTime);
$s=$stat->execute();
		if($s)
		{
			echo "success";
			session_start();
			$_SESSION['register']=$email;
			header("Location: ../loginpage.php"); 
    		exit;
		}
		else
		{
			echo "User already exists. Please Login!";
			die();
		}
}









if(isset($_POST["uploadAbout"]))
{
$about=$_POST["about"];
session_start();
if (isset($_SESSION["user"])) {
	$email=$_SESSION["user"];

$stat=$conn->prepare("UPDATE `users` SET `about` = ? WHERE `users`.`email` = ?;");
$stat->bind_param("ss",$about , $email);
$s=$stat->execute();
		if($s)
		{
			echo "<br> success updated abput";
			header("location:../uploadDP.php");
		}
		else
		{
			echo "error while updating about";
			die();
		}
	}
	else
{
	echo "<h1> error sessuionb<br>";
}
}

?>

