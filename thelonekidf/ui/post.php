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
 <?php
  error_reporting(0);   
    require_once("backphps/remote.php");
    if(isset($_POST['showPost']))
    {
        $postID=$_POST['setPostID'];

        $stat=$conn->prepare("SELECT `email`, `postTitle`, `post`, `date`, `privacy` FROM `posts` where `postID`=?");
        $stat->bind_param("s",$postID);

        $stat->execute();
        $stat->bind_result($email, $postTitle, $post, $date, $privacy);
        $stat->fetch();
    }
    else{
        echo "<h1>failed";
    }
    ?>   
    <div class="well container" id="singlePost" style="width: 500px;margin: auto;margin-top: 35px;">
<a href="timeline.php" class="btn btn-danger" style="float: right;">x</a><br><br>
                    <div class="row">
    <div class="col-sm-10"><button class="btn btn-default"><?php echo $email;  ?></button></div>
    <div class="col-sm-1">

    </div> 
</div>
    <br><br>
            <div class="well" id="contentAndHead" style="background-color: white">
                    <div class="well" id="postHeading" >
                    <button  name="showPost" class="btn btn-link    "><h4><?php echo $postTitle; ?>
                    </h4></button>
                    
                </div>
                    <br>
                    <p><?php echo  $post; ?></p>
                    </div>
                    <div>
                    <button class="btn btn-default"> <?php echo $date.' | '.$privacy; ?></button>
                       
                    </div>
                    </div>
                    <br>
</body>
    <?php require_once("footer.php"); ?>
</html>