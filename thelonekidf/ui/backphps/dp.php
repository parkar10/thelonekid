<?php 

if(isset($_POST["DPBtn"]))
{
    session_start();
    $email=$_SESSION['register'];
    $myArray = explode('@', $email);
    $name = $myArray[0];
    $path = 0;
    if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else{   
        $tname = $_FILES["file"]["name"];
         $myArray = explode('.', $tname);
         $tname = end($myArray);
         $name = $name.".".$tname;
        if (file_exists("../../data/images/DP/" . $name)){
            echo $name . " already exists. ";
        }
        else{
            $path = "../../data/images/DP/" . $name;
            move_uploaded_file($_FILES["file"]["tmp_name"],"../../data/images/DP/" . $name);
            //echo "Stored in: ".$path;
            $myArray = explode('/data/', $path);
            $path = end($myArray);
            $path = "../data/".$path;
            require_once('remote.php');
            $stat=$conn->prepare("UPDATE `users` SET `DPpath` = ? WHERE `users`.`email` = ?;");
            $stat->bind_param("ss",$path , $email);
            $s=$stat->execute();
            if($s){
            header("location:../profile.php");
            }
            else{
                echo "error while updating about";
                die();
            }
        }
    }
}
else{
    echo "<H1> error DP/";
}
if(isset($_POST["updateDPBtn"]))
{
    session_start();
    $email=$_SESSION['user'];
    $myArray = explode('@', $email);
    $name = $myArray[0];
    $path = 0;
    if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else{   
        $tname = $_FILES["file"]["name"];
         $myArray = explode('.', $tname);
         $tname = end($myArray);
         $name = $name.".".$tname;
        
            $path = "../../data/images/DP/" . $name;
            move_uploaded_file($_FILES["file"]["tmp_name"],"../../data/images/DP/" . $name);
            //echo "Stored in: ".$path;
            $myArray = explode('/data/', $path);
            $path = end($myArray);
            $path = "../data/".$path;
            require_once('remote.php');
            $stat=$conn->prepare("UPDATE `users` SET `DPpath` = ? WHERE `users`.`email` = ?;");
            $stat->bind_param("ss",$path , $email);
            $s=$stat->execute();
            if($s){
            header("location:../updateProfile.php");
            }
            else{
                echo "error while updating about";
                die();
            }
        
    }
}
else{
    echo "<H1> error DP/";
}





 ?>
