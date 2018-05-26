
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <?php
     error_reporting(0);   
       require_once("cdn.php"); ?>
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
        <label for="loginblock" style="font-size: 20px">ADMIN LOGIN:</label><br><br>
        <form action="backphps/login.php" method="post" name="adminloginForm">
            
            <input required placeholder="Email Id" type="email" class="form-control" name="aemail" />
            <br>
            <input required placeholder="Enter password" type="password" class="form-control" name="apwd"/>
            <br>
            <button type="submit"  class="btn btn-danger bt-lg" id="asubmit" name="alogin">Login</button>
        </form><! login form end>
           
    </div> <! loginblock end>
	</div>
    <div class="col-sm-3"></div>  
    </div>
</div>

    <?php require_once("footer.php"); ?>
    
</body>
</html>