<?php 
    include("../../user/connection.php");
    $sql = "UPDATE conadmin SET 
    Titlecon = '".$_POST["Titlecon"]."', 
    Namecon = '".$_POST["Namecon"]."', 
    Option = '".$_POST["Option"]."'
    WHERE CONID = '".$_POST["CONID"]."'";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("location: contactuser.php");
    } 
?>