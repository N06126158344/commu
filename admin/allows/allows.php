<?php 
include("../../user/connection.php");
$sql = "UPDATE users SET 
USERLEVEL = 'U' 
WHERE USERID = '".$_POST["USERID"]."'";
$query = mysqli_query($conn, $sql);
if($query){
    header("location: allows_user.php");
} 
?>