<!DOCTYPE html>
<html>
<head>
	<title>timeine</title>
	<?php  error_reporting(0); 	 require_once("cdn.php"); ?>
	<style type="text/css"> 
textarea
	{
		resize: none;
		font-size: 70px;
	}

#postBlock
  {
     opacity: 0.9;
    height: 530px;
    padding: 10px;
  }
#timelineProfile
{
	background-color: white;
	padding: 10px;
	text-align: center;
	margin-left: 20px;
}
#timelinePostWall
{

	background-color: white;
	padding: 10px;
	margin-left: 10px;
	text-align: left;
}
#timelineFeatured
{

	background-color: white;
	padding: 10px;
	text-align: center;
	margin-left: 10px;
	max-width: 700;
}
#timelineDPimg
{
	width: 150px;
	height: 150px;
	border-radius: 100px;
}
#timelineDP
{
	height: 250px;
	margin-bottom: 15px;
}
#timelineID
{
	height: 75px;
	margin-bottom: 15px;
	padding: 8px;
}

#timelineUpdates
{
	height: 8800px;
	padding: 10px;
}



</style>
</head>
<body>
<?php 	
session_start();
require_once("navbar.php");
	 error_reporting(0); 	

require("backphps/remote.php");
$email	=$_SESSION["user"];	

	$stat1= $conn->prepare("SELECT  `name`, `password`, `dob`, `gender`, `city`, `about` FROM `users` WHERE `email` = ? ");
	$stat1->bind_param("s",$email);
	$stat1->execute();
	$stat1->bind_result( $name, $pwd, $dob, $gender, $city, $about);
	$stat1->fetch();

 ?>
<div class="row">
	<div class="col-md-3" id="timelineProfile">
	
		<div class="well" id="timelineDP">
			<h4><?php echo $name; ?></h4>
			<img src="../data/images/DP/DP.png" id="timelineDPimg">	
		</div>

		<div class="well" id="timelineID">
			<h4><?php echo $email; ?></h4>
			<h5><?php echo $city; ?> </h5>
		</div>

		<div class="well" id="timelineUpdates" >
			<h5><?php echo $about; ?></h5>
		<?php	
		require("backphps/remote.php");
		$email	=$_SESSION["user"];	
		$stat1= $conn->prepare("SELECT `postTitle`, `date` FROM `posts` WHERE  `email` = ? ");
		$stat1->bind_param("s",$email);
		$stat1->execute();
		$stat1->bind_result( $postTitle, $date);
		while($stat1->fetch())
			{
			
			'<a class="btn btn-default" href=""> echo '.$postTitle.' | '.$date.'</a>';
		}
			?>
		</div>
	</div>



	<div class="col-md-5" id="timelinePostWall">

	<button id="showPostBlock" class="btn btn-success btn-block">click her to add post</button><br>
	<div class="well" id="postBlock" style="display: none;">
  <a id="hidePostBlock" class="btn btn-sm btn-danger" style="float: right;">x</a><br>
  				<h4 >We would like to here from you:</h4> 
  				<div class="form-control-static">
    				<form action="backphps/postfeed.php" method="post">
  						<label for="title">This post is about..</label>
  						<input required type="text" name="postTitle" class="form-control" placeholder="Title of story"></input><br>
  		    			<textarea required="required" placeholder="write your story" maxlength="20000" class="form-control" rows="10" cols="30" id="postArea" name="postContent" onkeypress="onTestChange();"></textarea>
   	<br>	
   	<label for="privacy">choose privacy:</label>
      <select class="form-control" name="privacy" id="privacy" style="width: 200px;">
        <option>select one</option>
        <option>only me</option>
        <option>everyone</option>
        <option>only close people</option>
      </select>
      <input required type="text" style="display: none;" name="dateTime" id="catchDate" name="time" />
      <br>
	<button type="submit" class="btn btn-success" name="postBtn" id="postBtn">post</button>
	</form>
</div>
</div>	
<?php
			require("backphps/remote.php");
			
			
			$stat=$conn->prepare('SELECT `postID`, `email`, `postTitle`, `post`, `date`, `privacy` FROM `posts` ORDER BY `postID` DESC;');
				$stat->execute();
				$stat->bind_result($postID,$email, $postTitle, $post, $date, $privacy); 
				while($stat->fetch())
				{	if(($privacy!="only me")||($email!=$_SESSION["user"]))
					{
						echo'<div class="well" id="singlePost" >
										<div class="row">'?>
						<div class="col-sm-10"><button class="btn btn-default">'.$email.'</button></div>
						<div class="col-sm-1">
							<form method="POST" action="backphps/deletepost.php">
								
							</form>
						</div> 
					</div><br>
										<div class="well" id="contentAndHead" style="background-color: white">
										<div class="well" id="postHeading" >
										<form action="post.php" method="post">
      				<input required type="text" name="setPostID" value="'.$postID.'" style="display:none">
					<button  name="showPost" class="btn btn-link type="submit"	"><h4>'.$postTitle.'</h4></button>
					</form>
										</div>
										<br>
										<p>'.$post.'</p>
					 					</div>
										<div><button class="btn btn-default">'.$date.' | '.$privacy.'</button></div>
										</div>
										<br><br>
										';
									}
				}
			
?>

</div>	

	<div class="col-md-3" id="timelineFeatured">	
		
</div>

<script type="text/javascript">
function onTestChange() {
    var key = window.event.keyCode;

    // If the user has pressed enter
    if (key === 13) {
        document.getElementById("postArea").value = document.getElementById("postArea").value + "\n";
        return false;
    }
    else {
        return true;
    }
}

	$("#showPostBlock").click(function(){
    $("#postBlock").show("slow");
    $("#showPostBlock").hide("slow");
});
	$("#hidePostBlock").click(function(){
    $("#postBlock").hide("slow");
    $("#showPostBlock").show("slow");
});
</script>


<?php require('footer.php'); ?>
</body>
</html>