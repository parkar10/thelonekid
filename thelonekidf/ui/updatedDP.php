<!DOCTYPE html>
<html>
<head>
	<title>continue to the Lone Kid</title>

<?php  error_reporting(0); 	require_once("cdn.php"); ?>
<style type="text/css">

#outerDiv
{
	width: 50%;
	text-align: center;
	background-color: white;
	padding: 30px;
textarea
{
	resize: none;
}
</style>

</head>
<body>
	<Br><Br><Br><Br><Br><Br>
	<?php 	

	require_once("navbar.php");
	 
	?>
	<div class="container" id="outerDiv">
		<div class="form-control-static" id="loginForword">
    <form action="backphps/dp.php" method="post" accept="image/gif,image/jpeg" enctype="multipart/form-data">
    <div class="well well-lg">
    	<input type="file" name="file" ></div>
    <br>
    <button type="submit" class="btn btn-success" name="updateDPBtn" id="updateDPBtn">Update Profile Picture</button>
	</form>	
	<a class="btn btn-link" href="updateProfile.php" style="float: right;" name="uploadDP">cancel</a>
</div>
</div>

</body>
</html>