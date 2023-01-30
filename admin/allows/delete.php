<?php 
include("../../connection.php");
$sql = "DELETE FROM users 
WHERE USERID = '".$_GET["USERID"]."'";
$query = mysqli_query($conn, $sql);
if($query){
    header("location: allows-user.php");
} 
?>