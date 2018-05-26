<!DOCTYPE html>
<html>
<head>
	<title>admin login</title>
    <?php require_once("cdn.php");
     error_reporting(0);     ?>

<style type="text/css">

nav
{
	height: 50px;
	padding-right: 25px;
}
#loginbtn
{
    width: 49.5%;
    height: 35px;
}
#panHeading
{
    size: 50px;
    text-align: center;
}

</style>
</head>
<body>





<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="nevbar-header">
	<a class="navbar-brand" href="indexpage.php"> TheLoneKid (Beta)</a>
    </div><!nav header>
    <a class="btn  btn-success navbar-btn navbar-right" id="navbtnlogin" 
    data-toggle="modal" data-target="#myModal">
        login / Sign Up
    </a>
    <a class="btn  btn-success navbar-btn navbar-right" href="backphps/logout.php" id="navbtnlogout" style="display: none;">
    Log Out
    </a>    
    <ul class="nav navbar-nav navbar-right">


	<li><a href="bestof.php">best of TheLoneKid</a></li>
	<li><a href="nogiveup.php">I won't give up!</a></li>
	<li><a href="https://www.7cups.com/forum/DepressionSupportCommunity_52/DepressionSessionForumActivities_332/IsSuicideBadIfitiswhyso_97217/">#noSuicide</a></li>
    <?php   if (isset($_SESSION['user'])) 
    {
        echo 
        
            '<li><a href="profile.php">Profile</a></li>
            <li><a href="timeline.php">Timeline</a></li>  
            </ul><!navbar content> 
            '
        ; 
    }
    ?>
  
    </nav><!navbar>







    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title" style="text-align: center;">Welcome to the TheLoneKid family</h4>
        </div><! modal header>
        <div class="modal-body">
        <div class="panel panel-success">
        <div class="panel-heading" id="panHeading">login</div>
        
        <div class="panel-body">
        <br>
        <div class="form-group" id="loginblock">
            <form action="backphps/login.php" method="post">
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        	<input placeholder="Email Id" type="email" class="form-control" name="lemail" />
        </div><!gylphicon email>
            <br>
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        	<input placeholder="Enter password" type="password" class="form-control" name="lpwd" />
            </div><!glyphicon password>
            <br><br>
            <button type="submit" class="btn btn-success bt-lg" id="lsubmit" name="login">Login</button>
            </form><! login form end>
            <button class="btn btn-default" id="regbtn" style="float: right;">click here to sign up</button> 
           
            </div> <! loginblock end>
            

            <div class="form-group" id="regblock"  style="display: none;">
            <form name="regFormregForm" action="backphps/register.php"  method="post">
        	<label for="name">Name</label>
        	<input placeholder="Enter Your Name" type="text" class="form-control" name="name"  id="name" /> <br>
        	<label for="email">Email</label>
        	<input placeholder=" Enter Your Email" type="email" class="form-control" name="remail" id="remail"  /><br>
        	<label for="password">Password</label>
        	<input placeholder="Enter Your Password" type="password" class="form-control" name="rpwd"  id="rpwd" />	<br>
        	<label for="password">Confirm Password</label>
        	<input placeholder="Confirm Your Password" type="password" class="form-control" name="rcpwd" id="rcpwd" /><br>
            <label for="dateOfBirth">Date of birth</label>
            <input type="Date" class="form-control" name="dob" style="width: 30%"  id="dob" /><br>
            <label for="gender">Gender</label>
            <select class="form-control" style="width: 30%" name="gender" id="gender">
            <option>select</option>
            <option>male</option>
            <option>female</option>
            <option>others</option>
            <option>rather not say</option>
            </select>
            <br>
            <label for="city">City / District</label>
            <input placeholder="City" type="text" class="form-control" name="city"/><br>
            <button type="submit" class="btn btn-success bt-lg" id="regsubmit" name="register">Sign Up</button>
            </form><! reg form end>
            
            <a class="btn btn-default" id="loginbtn"  style="float: right;">click here to login</a>  
            </div>	<! regblock end>
        

            </div><!panel body end>

            </div><!panel ends>

            </div><!modal body>

            </div><!modal content>

            </div><! modal dialogue>
            </div><!modal >
  
<br>


<script type="text/javascript">
$("#regbtn").click(function() {
    $("#loginblock").css("display","none");
    $("#regblock").css("display","block");
    $("#panHeading").text("Sign Up");
});
$("#loginbtn").click(function() {
    $("#loginblock").css("display","block");
    $("#regblock").css("display","none");
    $("#panHeading").text("login"); 
});

    <?php   if (isset($_SESSION['user'])) 
    {
        echo 
        
            '
             $("#navbtnlogin").css("display","none");
             $("#navbtnlogout").css("display","block");
            '
        ; 
    }
    ?>


    function ValidateContactForm()
{
    var name = document.regForm.name;
    var remail = document.regForm.remail;
    var rpwd = document.regForm.rpwd;
    var rcpwd = document.regForm.rcpwd;
    var dob = document.regForm.dob;
    var gender = document.regForm.gender;
    var city = document.regForm.city;

    if (name.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
    if (rpwd.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        pwd.focus();
        return false;
    }
    if (rpwd.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        pwd.focus();
        return false;
    }
    if (remail.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        remail.focus();
        return false;
    }
    if (remail.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        remail.focus();
        return false;
    }
    if (remail.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        remail.focus();
        return false;
    }

    if ((nocall.checked == false) && (phone.value == ""))
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (what.selectedIndex < 1)
    {
        alert("Please tell us how we can help you.");
        what.focus();
        return false;
    }

    if (remail.value == "")
    {
        window.alert("Please provide a detailed description or comment.");
        comment.focus();
        return false;
    }
    return true;
}

</script>



</body>
</html>