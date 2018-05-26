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

<body>
    <div class="row">

    <div class="col-sm-3"></div> 
    <div class="col-sm-6">
    <div class="well" id="loginpageDiv">     
    <div class="form-group" id="loginblock">
        <label for="loginblock" style="font-size: 20px">now click here to login:</label><br><br>
        <form action="backphps/login.php" method="post">
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  placeholder="Email Id" type="email" class="form-control" name="lemail" />
            </div><!gylphicon email>
            <br>
            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input  placeholder="Enter password" type="password" class="form-control" name="lpwd" />
            </div><!glyphicon password>
            <br><br>
            <button type="submit" class="btn btn-success bt-lg" id="lsubmit" name="login">Login</button>
        </form><! login form end>
           
    </div> <! loginblock end>
</div>
    <div class="col-sm-3"></div>  
    </div>
</div>
</body>
    <?php require_once("footer.php"); ?>
</html>