<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
nav
{
    height: 50px;
    padding-right: 25px;
}
</style>
<?php 
 error_reporting(0);    
    require("cdn.php");
    require("backphps/remote.php");
    if (isset($_SESSION['user'])) 
    {
        $email  =$_SESSION['user'];
            $stat= $conn->prepare('SELECT `name`, `dob`, `gender`, `city`, `about` FROM `users` WHERE `email` = ?');
        $stat->bind_param("s",$email);
        $stat->execute();
        $stat->bind_result( $name, $dob, $gender, $city, $about);
        $stat->fetch();
    }
    else
    {
        echo "failed";
    }

 ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="nevbar-header">
<a class="navbar-brand" href="indexpage.php"> TheLoneKid</a>
</div><!nav header>
<a class="btn  btn-success navbar-btn navbar-right" id="navbtn" data-toggle="modal" data-target="#myModal">
hey <?php $name ?>
    </a>
    <ul class="nav navbar-nav navbar-right">


    <li><a href="#">best of TheLoneKid</a></li>
    <li><a href="#">I won't give up!</a></li>
    <li><a href="#">#noSuicide</a></li>
    <li><a href="#">timeline</a></li>
    <li><a href="#">profile</a></li>
    </ul><!navbar content>   
    </nav><!navbar>
</body>
</html>




