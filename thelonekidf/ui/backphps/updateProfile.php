
<?php
 error_reporting(0); 	
require_once('remote.php');
session_start();
$email	=$_SESSION["user"];


if(isset($_POST["pwdupdate"])){
$pwd	=$_POST["pwd"];
$stat=$conn->prepare("UPDATE `users` SET `password`=? WHERE email=?");
$stat->bind_param("ss",$pwd, $email );
$s=$stat->execute();
		if($s)
		{
			header("Location:../updateProfile.php"); 
    		exit;
		}
}
if(isset($_POST["uNameupdate"])){
$name	=$_POST["name"];
$name	=ucwords($name);
$stat=$conn->prepare("UPDATE `users` SET `name`=? WHERE email=?");
$stat->bind_param("ss",$name, $email );
$s=$stat->execute();
		if($s)
		{
			header("Location:../updateProfile.php"); 
    		exit;
		}

}
if(isset($_POST["uSexupdate"])){
$uSex	=$_POST["gender"];
$uSex	=ucwords($uSex);
$stat=$conn->prepare("UPDATE `users` SET `gender`=? WHERE email=?");
$stat->bind_param("ss",$uSex, $email) ;
$s=$stat->execute();
		if($s)
		{
			header("Location:../updateProfile.php"); 
    		exit;
		}

}
if(isset($_POST["cityupdate"])){
$city	=$_POST["city"];
$city	=ucwords($city);
$stat=$conn->prepare("UPDATE `users` SET `city`=? WHERE email=?");
$stat->bind_param("ss",$city, $email) ;
$s=$stat->execute();
		if($s)
		{
			header("Location:../updateProfile.php"); 
    		exit;
		}

}
if(isset($_POST["aboutupdate"])){
$about	=$_POST["about"];
$about	=ucwords($about);
$stat=$conn->prepare("UPDATE `users` SET `about`=? WHERE email=?");
$stat->bind_param("ss",$about, $email) ;
$s=$stat->execute();
		if($s)
		{
			header("Location:../updateProfile.php"); 
    		exit;
		}

}
if(isset($_POST["deleteacc"])){
	$lpwd	=$_POST["pwd"];
	$stat= $conn->prepare('SELECT `password` FROM `users` WHERE `email` = ?');
		$stat->bind_param("s",$email);
		$stat->execute();
		$stat->bind_result( $uPassword);
		$stat->fetch();
	if($lpwd==$uPassword){
		echo "<h1>".$email."</h1>	";
		$stat=$conn->prepare("DELETE FROM `posts` WHERE `email`=?");
		$stat->bind_param("s", $email);
		$s=$stat->execute();
		var_dump($stat);
		//$stat=$conn->prepare("DELETE FROM `users` WHERE email=?");
		$stat->bind_param("s", $email) ;
		$s=$stat->execute();
		if($s){
			session_start();
			session_destroy();
			header('Location: ../indexpage.php'); 
    		exit;
		}
		else {
    		echo "Error deleting record: ";
		}
	}
	else{
			echo "password incorrect";
	}
	 error_reporting(0); 	
}
?>