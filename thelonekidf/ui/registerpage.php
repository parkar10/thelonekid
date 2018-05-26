<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <?php require_once("cdn.php"); ?>
<style type="text/css">
    #loginpageDiv
    {
        width: 600px;
margin-top: 50px;
margin-bottom: 50px;
    }    
</style>

<body><br><br><br>
    <div class="row">

    <div class="col-sm-3"></div> 
    <div class="col-sm-6">
    

<div class="form-group well" id="regblock">
            <form action="backphps/register.php"  method="post">
            <h3><b for="error" id="regError">REGISTER YOURSELF HERE:</b></h3><br>
            <label for="name">Name</label>
            <input required placeholder="Enter Your Name" type="text" class="form-control" name="name"  id="name" /> <br>
            <label for="email">Email</label>
            <input required placeholder=" Enter Your Email" type="text" class="form-control" name="remail" id="remail"  /><br>
            <label for="password">Password</label>
            <input required placeholder="Enter Your Password" type="password" class="form-control" name="rpwd"  id="rpwd" /> <br>
            <label for="password">Confirm Password</label>
            <input required placeholder="Confirm Your Password" type="password" class="form-control" name="rcpwd" id="rcpwd" /><br>
            <label for="dateOfBirth">Date of birth</label>
            <input required type="Date" class="form-control" name="dob" style="width: 40%"  id="dob" /><br>
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
            <input required placeholder="City" type="text" class="form-control" name="city"/><br>
            <button type="submit" class="btn btn-success bt-lg" id="regsubmit" name="register">Sign Up</button>
            </form><! reg form end>
             
            </div>  <! regblock end>
            <br><br>




</div>
    <div class="col-sm-3"></div>  
    </div>
</div>
</body>
    <?php require_once("footer.php"); ?>
</html>



        
