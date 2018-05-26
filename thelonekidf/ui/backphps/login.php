<?php require_once("../cdn.php"); //bootstrap cdn ?>
<link rel="stylesheet" type="text/css" href="../background.css">
<?php
require_once("remote.php");
if(isset($_POST['login']))
{
	$email	=$_POST['lemail'];
	$pwd	=$_POST['lpwd'];
	$stat= $conn->prepare("SELECT `email`,`password`,`name` FROM `users` WHERE `email`=?");
	$stat->bind_param("s",$email);
	$stat->execute();
	$stat->bind_result($cemail,$cpwd,$name);
	$stat->fetch();
	if(($pwd==$cpwd)&&($email==$cemail)){
		session_start();
		$_SESSION["user"]=$email;	
		header("location:../timeline.php");
		

	}
	else if(($pwd!=$cpwd)&&($email==$cemail)){
		
		echo '<center><div class="alert alert-lg alert-success"><strong>password incorrect!</strong> <a href="../loginpage1.php"> click here to try again.</a></div></center>';

	}
	else {
				echo '
				<center><div class="alert alert-lg alert-success"><strong>user doesnt exist!</strong> <a href="../registerpage.php"> click here to register.</a>or<a href="../loginpage.php"> back to login</a></div></center>';
	}


}
if(isset($_POST['rlogin']))
{
	$email	=$_POST['lemail'];
	$pwd	=$_POST['lpwd'];
	$stat= $conn->prepare("SELECT `email`,`password`,`name` FROM `users` WHERE `email`=?");
	$stat->bind_param("s",$email);
	$stat->execute();
	$stat->bind_result($cemail,$cpwd,$name);
	$stat->fetch();
	if(($pwd==$cpwd)&&($email==$cemail)){
		session_start();
		$_SESSION["user"]=$email;	
		header("location:../uploadAbout.php");
		exit();

	}
	else if(($pwd!=$cpwd)&&($email==$cemail)){
		
		echo '<center><div class="alert alert-lg alert-success"><strong>password incorrect!</strong> <a href="../loginpage.php"> click here to try again.</a></div></center>';

	}

	else {
				echo '
				<center><div class="alert alert-lg alert-success"><strong>user doesnt exist!</strong> <a href="../registerpage.php"> click here to register.</a>or<a href="../loginpage.php"> back to login</a></div></center>';
	}
}


if(isset($_POST['alogin']))
{
	$email	=$_POST['aemail'];
	$pwd	=$_POST['apwd'];
	$stat= $conn->prepare("SELECT `email`,`password`,`name` FROM `admin` WHERE `email`=?");
	$stat->bind_param("s",$email);
	$stat->execute();
	$stat->bind_result($cemail,$cpwd,$name);
	$stat->fetch();
	if(($pwd==$cpwd)&&($email==$cemail)){
		session_start();
		$_SESSION["admin"]=$email;
		header("location:../admin.php");
		exit();

	}
	else if(($pwd!=$cpwd)&&($email==$cemail)){
		
		echo '<center><div class="alert alert-lg alert-success"><strong>password incorrect!</strong> <a href="../adminloginpage.php"> click here to try again.</a></div></center>';

	}

	else {
				echo '
				<center><div class="alert alert-lg alert-success"><strong>YOU ARE NO ADMIN!</strong> <a href="../adminloginpage.php"> back to login</a></div></center>';
	}
}
?>