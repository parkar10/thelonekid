<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<?php
	 error_reporting(0); 	
	 require_once("cdn.php");
	session_start(); ?>
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
	  	#likeBtn
	  	{
	    	border-radius: 20px;
	    	width: 40px;
	  	}
		#timelineProfile
		{
			padding: 10px;
			text-align: center;
			margin-left: 20px;
			max-width: 700;
		}
		#timelinePostWall
		{
			background-color: white;
			padding: 10px;
			margin-left: 10px;
			max-height: 7000px;
		}
		#empty
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
			float: left;
		}
		#timelineDP
		{
			height: 335px;
			margin-bottom: 15px;
			padding: 15px;
		}
		#timelineID
		{
			height: 85px;
			padding: 8px;
			background-color: white;
		}
	
		#timelineUpdates
		{
			max-height: 500px;
			padding: 10px;
		}
</style>

</head>
<body>
	<?php
	require_once("navbar.php");


	require("backphps/remote.php");

	if (isset($_SESSION['user'])) 
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
	} ?>
	<div class="row">
		<div class="col-md-3" id="timelineFeatured">	
		
	</div><!leftSide>
		
		<div class="col-md-5" id="timelinePostWall">
			<div class="well" id="timelineDP" style="text-align: center; background-color: #cdcdcd;">
				<br>
				<img src="../data/images/DP/DP.png" id="timelineDPimg" >
				<br><br>
				<button class="btn btn-link"><?php echo $name; ?></button><br>
				<a class="btn btn-danger" href="updateProfile.php">Update Profile</a>
				<br><br>
				<h6><!about></h6>
				<br>
				<div class="well" id="timelineID" style="text-align: center;">
					<button class="btn btn-link"><?php echo $email; ?></button><br>
					<h4 ><?php echo $city; ?></h4>
					<br><br>

				</div>	
			</div><!profileblock>

	<button id="showPostBlock" class="btn btn-success btn-block">click her to add post</button><br>
			<div class="well" id="postBlock" style="display: none;">
				<a id="hidePostBlock" class="btn btn-sm btn-danger" style="float: right;">x</a><br>
  				<h4 >We would like to here from you:</h4> 
  				<div class="form-control-static">
    				<form action="backphps/postfeed.php" method="post">
  						<label for="title">This post is about..</label>
  						<input required type="text" name="postTitle" class="form-control" placeholder="Title of story"></input><br>
  		    			<textarea required="required" placeholder="write your story" maxlength="20000" class="form-control" rows="10" cols="30" id="postArea" name="postContent"></textarea>
   						<br>	
   						<label for="privacy">choose privacy:</label>
      					<select class="form-control" name="privacy" id="privacy" style="width: 200px;">
        					<option>select one</option>
        						<option>only me</option>
        						<option>everyone</option>
        						<option>only close people</option>
      						</select>
      						<input required type="text" style="display: none;" name="dateTime" id="catchDate" name="time"/>
      						<br>
						<button type="submit" class="btn btn-success" name="postBtn" id="postBtn">post</button>
					</form>
				</div>
			</div><! uploadstoryblock>




				
				<?php 
				
				require("backphps/remote.php"); 
				$email=$_SESSION['user'];
				$stat=$conn->prepare("SELECT `postID`, `postTitle`, `post`, `date`, `privacy`, `liked`, `likeCount` FROM `posts` WHERE `email`=? ORDER BY `postID` DESC");
					$stat->bind_param("s",$email);
					$stat->execute();
					$stat->bind_result( $postID, $postTitle, $post, $date, $privacy, $liked, $likeCount); 

				while($stat->fetch())
				{
					
					echo'
					<div class="well" id="singlePost" >

					<div class="row">
	<div class="col-sm-10"><button class="btn btn-default">'.$email.'</button></div>
	<div class="col-sm-1">
		<div class="dropdown">
    <button style="float-right;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="float-right; width:30px;">
      <li>
      <form method="post" action="backphps/deletePost.php">
      <input required type="text" name="setPostID" value="'.$postID.'" style="display: none;">
      <button class="btn btn-link btn-sm" type="submit" name="deletePostBtn">
      		delete
      </button>
      </form>
      </li>
    </ul>
  </div>
	</div> 
</div><br><br>
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
					<div>
					<button class="btn btn-default"> '.$date.' | '.$privacy.'</button>
					</div>
					</div>
					<br><br>
					';
					
				}
				?>
			</div><! feedblock>


		<div class="col-md-3" id="empty" style="background-color: #303030">
		
		<h3 style="color: white">click here to donate!</h3>
	<p style="color: #909090;">We are happy to hear that another one came ahead to protest <strong>SUICIDE</strong> </p>
	<button class="btn btn-warning btn-block">click here to donate</button>
	</div>

</div><! right>

<?php require('footer.php'); ?>


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

<?php $_SESSION['user']= $email; ?>
</body>
</html>