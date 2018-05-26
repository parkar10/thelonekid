<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <?php
     error_reporting(0);     require_once("cdn.php"); ?>
<style type="text/css">
    #loginpageDiv
    {
        width: 600px;
margin-top: 50px;
margin-bottom: 50px;
    }    
</style>

<body>
    <div class="row">

    <div class="col-sm-3"></div> 
    <div class="col-sm-6">
    <div class="well" id="loginpageDiv">     
    <div class="form-group" id="loginblock">
        <label for="loginblock" style="font-size: 20px">LOG IN HERE:</label><br><br>
        <form onsubmit="validateForm();" action="backphps/login.php" method="post" name="loginForm">
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  placeholder="Email Id" type="email" class="form-control" name="lemail" />
            </div><!gylphicon email>
            <br>
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input  placeholder="Enter password" type="password" class="form-control" name="lpwd" />
            </div><!glyphicon password>
            <br><br>
            <button type="submit"  class="btn btn-success bt-lg" id="lsubmit" name="rlogin">Login</button>
        </form><! login form end>
           
    </div> <! loginblock end>
</div>
    <div class="col-sm-3"></div>  
    </div>
</div>

    <?php require_once("footer.php"); ?>
    <script><script>
function ValidateForm()
{
    var pwd = document.ContactForm.lpwd;
    var email = document.ContactForm.lemail;
    if (pwd.value == "")
    {
        window.alert("Please enter your name.");
        pwd.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
</script>
</script>
</body>
</html>