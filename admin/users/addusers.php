<?php 
include("../../user/connection.php");
$sql = "INSERT INTO users SET 
Firstname = '".$_POST["Firstname"]."', 
Lastname = '".$_POST["Lastname"]."', 
Email = '".$_POST["Email"]."', 
Username = '".$_POST["Username"]."', 
Password = '".$_POST["Password"]."', 
Date = '".$_POST["Date"]."',
Sex = '".$_POST["Sex"]."' 
USERLEVEL = '".$_POST["USERLEVEL"]."' ";
$query = mysqli_query($conn,$sql);
if($query){
    header("location: create_user.php");
} 
?>