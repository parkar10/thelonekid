
<?php
function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

echo  generateRandomString(7); 
 error_reporting(0); 	
?>