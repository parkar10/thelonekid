<?php
$name = 'akshay';
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {   
    if (file_exists("dp/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
         $tname = $_FILES["file"]["name"];
         $myArray = explode('.', $tname);
         $tname = end($myArray);
         $name = $name.".".$tname;
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "dp/" . $name);
      echo "Stored in: " . "dp/" .$name; //<- This is it
      }
    }
?>