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
}
textarea
{
	resize: none;
	width: 99%;
}
</style>

</head>
<body>
	<?php 	if (isset($_SESSION['user'])) 

    	require("navbar1.php"); 
 ?>
	<div class="container" id="outerDiv">
		<div class="form-control-static">
    <form action="backphps/register.php" method="post">
    <div class="well well-lg">
    	<label for="about">tell us about yourself (30 Characters Max):</label><br><br>
    	<textarea required="required" maxlength="30" rows="3" cols="10" name="about"></textarea> 
    	
    </div>
    <br>
    <button type="submit" class="btn btn-success" name="uploadAbout">Submit</button>
	</form>	
	<a href="uploadDP.php" class="btn btn-link" style="float: right;">upload later</a>
</div>
</div>

</body>
</html>