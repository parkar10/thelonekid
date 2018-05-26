	<?php
	require_once("remote.php");
	$stat=$conn->prepare("SELECT `email`, `postTitle`, `post`, `date`, `privacy` FROM `posts` ");
	$stat->execute();
	$stat->bind_result($nameP, $postTitle, $post, $date, $privacy);
	echo $postTitle;
	 error_reporting(0); 	
	?>

