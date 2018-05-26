<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <?php  error_reporting(0);   require_once("cdn.php"); ?>
<style type="text/css">
label{
	margin-right: 10px;
}
</style>

<body style="background-color: #dedede">
  

    <?php 
    session_start();
    require_once("navbar.php"); 
  if (!is_null($_SESSION['user'])) 
  {
    $email  =$_SESSION['user'];
    require_once("backphps/remote.php");
    $stat= $conn->prepare('SELECT `name`,`password`,`dob`, `gender`, `city`, `about`,`DPpath` FROM `users` WHERE `email` = ?');
    $stat->bind_param("s",$email);
    $stat->execute();
    $stat->bind_result( $name,$pwd, $dob, $uSex, $city, $about,$path);
    $stat->fetch();
/*
<div class=" well row">  
  <div class="col-sm-12">
    <button type="button" id="deleteaccount" class="btn btn-danger btn-block">Delete Account</button>
    <form action="backphps/updateProfile.php" method="POST" id="formd" style="display: none;">
    <div class="form-group">
    <label >Enter the password to continue :</label>
    
    <input required  style="width: 200px;" type="password" class="form-control" id="newpwd" name="pwd">
    </div>
    <button type="submit" name="deleteacc" class="btn btn-primary" data-toggle="modal" data-target="#myModal">submit</button>
  </form>
    </div>
</div>*/

  }
  else
  {
    echo "did not go to post part";
  }
   error_reporting(0); 	  
    ?>
<div class="row" >




<div class="col-sm-1" >
  </div>




  <div class="well col-sm-3" style="text-align: center;height: 730px">
    <br><br><br><br>
    <img style="width: 200px; height: 200px; border-radius: 100px;" src=<?php echo $path; ?>>
    <br><br>
    <a href="updatedDP.php" class="btn btn-danger btn-lg">update profile picture</a>
    <br><br>
    <div class=" well">
      <a href="profile.php" class="btn btn-lg btn-link"><?php echo $email; ?></a>
    </div>
  </div>



  <div class="col-sm-1">
  </div>



  <div class="col-sm-6 well" style=" height: 730px; padding: 20px;">
    <br><br><br><br>
    <div class=" well row">
  <div class="col-sm-8">  
  <label >password: </label><span>*****</span>
    
    <form action="backphps/updateProfile.php" method="POST" id="forme" style="display: none;">
    <div class="form-group">
    <label >Type new :</label>
    <input required  style="width: 200px;" type="password" name="pwd" class="form-control" id="pwd">
    </div>
    <button type="submit" name="pwdupdate" class="btn btn-primary">submit</button>
  </form>
</div>
<div class="col-sm-3"><button type="button" id="updatebtne" class="btn btn-primary">update</button><br></div>
</div>




<div class=" well row">
  <div class="col-sm-8">  
  <label >Name: </label><span><?php echo $name; ?></span>
    
    <form action="backphps/updateProfile.php" method="POST" id="formn" style="display: none;">
    <div class="form-group">
    <label >Type new :</label>
    <input required  style="width: 200px;" type="text" name="name"  class="form-control" id="uName">
    </div>
    <button type="submit" name="uNameupdate" class="btn btn-primary">submit</button>
  </form>
</div>
<div class="col-sm-3"><button type="button" id="updatebtnn" class="btn btn-primary">update</button><br></div>
</div>



<div class=" well row">
  <div class="col-sm-8">  
  <label >Name: </label><span><?php echo $uSex; ?></span>
    
    <form action="backphps/updateProfile.php" method="POST" id="forms" style="display: none;">
    <div class="form-group">
    <label >Choose :</label>
    <select class="form-control" style="width: 30%" name="gender" id="gender">
            <option>select</option>
            <option>male</option>
            <option>female</option>
            <option>others</option>
            <option>rather not say</option>
    </select>
    </div>
    <button type="submit" name="uSexupdate" class="btn btn-primary">submit</button>
  </form>
</div>
<div class="col-sm-3"><button type="button" id="updatebtns" class="btn btn-primary">update</button><br></div>
</div>


<div class=" well row">
  <div class="col-sm-8">  
  <label >City: </label><span><?php echo $city; ?></span>
    
    <form action="backphps/updateProfile.php" method="POST" id="formc" style="display: none;">
    <div class="form-group">
    <label >Type new :</label>
    <input required  style="width: 200px;" type="text" name="city"  class="form-control" id="city">
    </div>
    <button type="submit" name="cityupdate" class="btn btn-primary">submit</button>
  </form>
</div>
<div class="col-sm-3"><button type="button" id="updatebtnc" class="btn btn-primary">update</button><br></div>
</div>



<div class=" well row">
  <div class="col-sm-8">  
  <label >About you: </label><span><?php echo $about; ?></span>
    
    <form action="backphps/updateProfile.php" method="POST" id="forma" style="display: none;">
    <div class="form-group">
    <label >Type new :</label>
    <textarea  style="width: 300px;height:100px;" type="text" name="about" class="form-control" id="about"></textarea>
    </div>
    <button type="submit" name="aboutupdate" class="btn btn-primary">submit</button>
  </form>
</div>
<div class="col-sm-3"><button type="button" id="updatebtna" class="btn btn-primary">update</button><br>
</div>
</div>
  </div>
</div>
<?php require_once("footer.php"); ?> 











<script type="text/javascript">
  $("#updatebtne").click(function(){
    $("#forme").show();
    $("#updatebtne").hide();
    $("#pwd").focus();
});
$("#updatebtnc").click(function(){
    $("#formc").show();
    $("#updatebtnc").hide();
    $("#city").focus();
});
    $("#updatebtnn").click(function(){
    $("#formn").show();
    $("#updatebtnn").hide();
    $("#uName").focus();
});
      $("#updatebtns").click(function(){
    $("#forms").show();
    $("#updatebtns").hide();
    $("#gender").focus();
});
     $("#updatebtna").click(function(){
    $("#forma").show();
    $("#updatebtna").hide();
    $("#about").focus();
});
      $("#deleteaccount").click(function(){
    $("#formd").show();
    $("#newpwd").focus();
});
</script>    	
</body>
</html>