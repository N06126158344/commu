<?php 
include("../../user/connection.php");
$sql = "DELETE FROM posts 
WHERE POSTID = '".$_GET["POSTID"]."'";
$query = mysqli_query($conn,$sql);
if($query){
    echo "<script>alert('ลบเรียบร้อยแล้ว'); window.location = 'publish.php?POSTID=$POSTID';</script>";
} 
?>