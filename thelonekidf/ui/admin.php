<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <?php
     	error_reporting(0); 
      	require_once("cdn.php");
    ?>
<style type="text/css">
    
</style>

<body>

<div class="well" id="postBlock" style="width: 50%;margin: auto;margin-top: 30px;">
			<h3>Add a featured Post</h3>
  				<div class="form-control-static">
    				<form action="backphps/postfeed.php" method="post">
  						<label for="title">This post is about..</label>
  						<input required type="text" name="postTitle" class="form-control" placeholder="Title of story"></input><br>
  		    			<textarea required="required" placeholder="write your story" maxlength="20000" class="form-control" rows="10" cols="30" id="postArea" name="postContent" onkeypress="onTestChange();"></textarea>
<script>
function onTestChange() {
    var key = window.event.keyCode;
    if (key === 13) {
        document.getElementById("postArea").value = document.getElementById("postArea").value + "\n";
        return false;
    }
    else {
        return true;
    }
}
</script>
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
						<button type="submit" class="btn btn-success" name="fpostBtn" id="postBtn">post</button>
					</form>
				</div>
			</div><! uploadstoryblock>
</body>
</html>