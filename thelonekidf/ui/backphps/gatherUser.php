	<?php
session_start();

	require("remote.php");
	
	if (!isset($_SESSION['user'])) 
	{
		$email	=$_SESSION['user'];
		$stat= $conn->prepare('SELECT `name`, `dob`, `gender`, `city`, `about` FROM `users` WHERE `email` = ?');
		$stat->bind_param("s",$email);
		$stat->execute();
		$stat->bind_result( $name, $dob, $gender, $city, $about);
		$stat->fetch();
	}
	else
	{
		echo "failed";
	}
	 error_reporting(0); 	
	?>

