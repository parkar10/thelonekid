<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<?php	
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
			max-width: 700;
		}
		#timelinePostWall
		{
			background-color: white;
			padding: 10px;

			max-height: 7000px;
		}
		#empty
		{
			background-color: white;
			padding: 10px;
			
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
			height: 430px;
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
		$stat= $conn->prepare('SELECT `name`, `dob`, `gender`, `city`, `about` ,`DPpath` FROM `users` WHERE `email` = ?');
		$stat->bind_param("s",$email);
		$stat->execute();
		$stat->bind_result( $name, $dob, $gender, $city, $about,$path);
		$stat->fetch();
	}
	else
	{	
		echo "failed";
	} ?>
	<br><br><br><br>
	<div class="row">
		<div class="col-md-5" id="timelineFeatured" >	
				<div class="well" id="timelineDP" style="text-align: center; background-color: #cdcdcd;">
					<br>
					<img src='<?php echo $path; ?>' id="timelineDPimg" >
					<br>
					<button class="btn btn-lg btn-link" style="font-size: 30px"><?php echo $name; ?></button><br>
					<a class="btn btn-lg btn-danger" href="updateProfile.php">Update Profile</a>
					<br><br><br>
					<div class="well">
						<h4><?php echo $about; ?></h4>
					</div>
					<div class="well" id="timelineID" style="text-align: center;">
						<button class="btn btn-link"><?php echo $email; ?></button><br>
						<h4 ><?php echo $city; ?></h4>
						<br>

					</div>	
					<br>
					
				</div>
		</div><!leftSide>
		
		<div class="col-md-6" id="timelinePostWall">
			
				<button id="showPostBlock" class="btn btn-success btn-block">click her to add post</button>
					<div class="well" id="postBlock" style="display: none;">
  						<a id="hidePostBlock" class="btn btn-sm btn-danger" style="float: right;">x</a><br>
  						<h4 >We would like to here from you:</h4> 
  						<div class="form-control-static">
    						<form action="backphps/postfeed.php" method="post" autocomplete="off">
  							<label for="title">This post is about..</label>
  							<input  type="text" name="postTitle" class="form-control" placeholder="Title of story"></input><br>
  		    				<textarea   placeholder="write your story" maxlength="20000" class="form-control" rows="10" cols="30" id="postArea" name="postContent"></textarea>
   							<br>	
   							<label for="privacy">choose privacy:</label>
      						<select class="form-control" name="privacy" id="privacy" style="width: 200px;">
        					<option>select one</option>
        					<option>only me</option>
        					<option>everyone</option>
        					<option>only close people</option>
      						</select>
      						<input   type="text" style="display: none;" name="dateTime" id="catchDate" name="time" />
      						<br>
							<button type="submit" class="btn btn-success" name="postBtn" id="postBtn">
								post
							</button>
							</form>
						</div>
					</div>	
					<br>
					<h3>Your posts:</h3>	
				<?php
					require("backphps/remote.php");
			
			
			$stat=$conn->prepare('SELECT `postID`, `postTitle`, `post`, `date`, `privacy` FROM `posts` WHERE email = ? ORDER BY `postID` DESC;');
				$stat->bind_param("s",$email);
				$stat->execute();
				$stat->bind_result($postID,$postTitle, $post, $date, $privacy); 
				$countPost = 0;
				while($stat->fetch())
				{	
					$countPost = $countPost + 1;
						echo'
					<div class="well" id="singlePost" >
						<div class="row">
							<div class="col-sm-6">
							<button  class="btn btn-default">'.$email.'</button>
							</div>
						<div class="col-sm-6">
							<div style="float:right; ">
    							<button class="btn btn-danger" type="button" id="delPosDivBtn">
    								X
    							</button>
    							
      									<div class = "well" id = "delPosDiv" style="display:none; background-color:white;">
      										<form action="backphps/deletePost.php" method="post">
      											<input style="display:none" type="text" name="postID" value="'.$postID.'">
      											<button name="deletePostBtn" type="submit" class="btn  btn-danger">
      											 confirm delete
      											 </button>
      											 
      											</form>
      											<br>
      											<button name="deletePostHideBtn" id="deletePostHideBtn" class="btn btn-block btn-default"  style>cancel</button>
      										
      									</div>
    								</ul>
  							</div>
						</div> 
						</div><br>
						<div class="well" id="contentAndHead" style="background-color: white">
							<div class="well" id="postHeading" >
								<form action="post.php" method="post">
      								<input type="text" name="setPostID" value="'.$postID.'" style="display:none">
									<button  name="showPost" class="btn btn-link type="submit"><h4>'.$postTitle.'</h4></button>
								</form>
							</div>
							<br>
							<p>'.$post.'</p>
					 	</div>
						<div>
							<button class="btn btn-default">'.$date.' | '.$privacy.'</button>
						</div>
					</div>
						<br><br>
										';
				}
				if ($countPost==0) {
					echo '<button class="btn btn-lg btn-block btn-defualt" id="noPostBtn">No Posts. Try posting something.</h4>';
				}
			
?>	
		

		</div><!profileblock>
	
	









	</div><! row>
	<br><br>
<?php require('footer.php'); ?>


<script type="text/javascript">
	$("#noPostBtn").click(function(){
    $("#postBlock").show("slow");
    $("#showPostBlock").hide("slow");
});

	$("#deletePostHideBtn").click(function(){
    $("#delPosDivBtn").show();
    $("#delPosDiv").hide();
});
	$("#delPosDivBtn").click(function(){
    $("#delPosDiv").show();
    $("#delPosDivBtn").hide();
});

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



		






















		
