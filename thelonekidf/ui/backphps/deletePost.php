	<?php
	require_once("remote.php");
	if(isset($_POST['deletePostBtn']))
	{
		$postID=$_POST['postID'];
		$stat=$conn->prepare("DELETE FROM `posts` WHERE `postID`=?");
		$stat->bind_param("s",$postID);
		$stat->execute();
		header('location:../profile.php');
	}
	else{
		echo "failed";
		header('location:../profile.php');
	}
	?>