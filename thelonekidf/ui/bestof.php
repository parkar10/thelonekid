<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<?php require_once("cdn.php");
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
<?php
function setPostSession() {
    session_start();
    $_SESSION["post"]=$postid;
}
?>
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
		<div class="row">
	<div class="col-md-3" id="timelineProfile">

	</div>



	<div class="col-md-5" id="timelinePostWall">

	
<div class="well" id="singlePost" >
										<div class="row">
						<div class="col-sm-10"><button class="btn btn-default">djkhaled@reddiff.com</button></div>
						<div class="col-sm-1">
							<div class="dropdown" style="width:50%;">
					    <button style="float-right;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu" style="width:50%;">
					      <li><a href="backphps\deletePost.php" onclick="setPostSession();" style="width:50%;">delete</a></li>
					    </ul>
					  </div>
						</div> 
					</div><br>
										<div class="well" id="contentAndHead" style="background-color: white">
										<div class="well" id="postHeading" >
										<button onclick="" class="btn btn-link" id="postHeadlink"><h4>YOLO</h4></button>
										</div>
										<br>
										<p>Some would argue that at times it's better to die than to face the tough situation one is in, but honestly in most cases things do get better. The future is unknown, even though it might seem bleak. It could be positive or negative. It would be a pity if things really do get better, it would also be a pity if one chose to leave the world without fully experiencing what one would have experienced.

 Also, to die and to live shouldn't really be compared as they are really complete opposites</p>
					 					</div>
										<div><button class="btn btn-default">2018-03-27 03:26:29 | everyone</button></div>
										</div>
										<br><br>
										<div class="well" id="singlePost" >
										<div class="row">
						<div class="col-sm-10"><button class="btn btn-default">iambad@gmail.com</button></div>
						<div class="col-sm-1">
							<div class="dropdown" style="width:50%;">
					    <button style="float-right;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu" style="width:50%;">
					      <li><a href="backphps\deletePost.php" onclick="setPostSession();" style="width:50%;">delete</a></li>
					    </ul>
					  </div>
						</div> 
					</div><br>
										<div class="well" id="contentAndHead" style="background-color: white">
										<div class="well" id="postHeading" >
										<button onclick="" class="btn btn-link" id="postHeadlink"><h4>Completed vs. Died by</h4></button>
										</div>
										<br>
										<p>Warning: I am a word geek. I love language, and I also love discussing its intricacies. Some will deride this discussion of suicide terminology as political correctness gone awry. But language has power. If changing our language can help suicidal people to feel safer asking for help, then changing language can save lives. </p>
					 					</div>
										<div><button class="btn btn-default">2018-03-27 03:18:24 | everyone</button></div>
										</div>
										<br><br>
										<div class="well" id="singlePost" >
										<div class="row">
						<div class="col-sm-10"><button class="btn btn-default">someunknown@gmail.com</button></div>
						<div class="col-sm-1">
							<div class="dropdown" style="width:50%;">
					    <button style="float-right;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu" style="width:50%;">
					      <li><a href="backphps\deletePost.php" onclick="setPostSession();" style="width:50%;">delete</a></li>
					    </ul>
					  </div>
						</div> 
					</div><br>
										<div class="well" id="contentAndHead" style="background-color: white">
										<div class="well" id="postHeading" >
										<button onclick="" class="btn btn-link" id="postHeadlink"><h4> Suicidal Thoughts</h4></button>
										</div>
										<br>
										<p>The popular image of someone who is in danger of suicide goes like this: A person has suicidal thoughts. It’s a crisis. The person gets help, and the crisis resolves within days or weeks.

That’s the popular image, and thankfully it does happen for many people. But for others, suicidal thoughts do not go away. Their suicidal thoughts become chronic.

The pattern of chronic suicidal thoughts is similar to that of a person with any other kind of chronic condition: For some people, there are flare-ups where the condition is far worse than normal, and then the symptoms subside, but only temporarily. And for other people, the symptoms never subside. Those people live with their symptoms – in this case, suicidal thoughts – every day.</p>
					 					</div>
										<div><button class="btn btn-default">2018-03-27 03:14:38 | only close people</button></div>
										</div>
										<br><br>
										<div class="well" id="singlePost" >
										<div class="row">
						<div class="col-sm-10"><button class="btn btn-default">michelstoner@gmail.com</button></div>
						<div class="col-sm-1">
							<div class="dropdown" style="width:50%;">
					    <button style="float-right;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu" style="width:50%;">
					      <li><a href="backphps\deletePost.php" onclick="setPostSession();" style="width:50%;">delete</a></li>
					    </ul>
					  </div>
						</div> 
					</div><br>
										<div class="well" id="contentAndHead" style="background-color: white">
										<div class="well" id="postHeading" >
										<button onclick="" class="btn btn-link" id="postHeadlink"><h4>Suicide Prevention</h4></button>
										</div>
										<br>
										<p>Many people take offense at my stance on suicide prevention. They send me angry emails. They post challenging comments on this site. A common argument is that people should be free to die by suicide without intervention by others, no matter what:

“For some people there is little to be done sadly and if they want to exit life then I completely understand and I believe they should be helped: either by medical personnel or at least by giving them access to pain-free means. This is the humane, moral and decent thing to do and it respects their autonomy and human dignity…”</p>
					 					</div>
										<div><button class="btn btn-default">2018-03-27 03:13:33 | everyone</button></div>
										</div>
										<br><br>
										
</div>	

	<div class="col-md-3" id="timelineFeatured">	
				
	</div>
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


	</div>

<?php require('footer.php'); ?>
</body>
</html>