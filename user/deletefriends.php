<?php
    session_start();
    include('connection.php');

    $USERID = $_GET['FRIENDID'];
    $sql = "DELETE FROM friends WHERE FRIENDID = '$USERID' AND YOURSELFID = '".$_SESSION["USERID"]."'";
    $sql1 = "DELETE FROM friends WHERE FRIENDID = '".$_SESSION["USERID"]."' AND YOURSELFID = '$USERID'";
    $query = mysqli_query($conn, $sql);
    $query1 = mysqli_query($conn, $sql1);
    if($query){
        if($query1){
            echo "<script>alert('ลบเพื่อนเรียบร้อยแล้ว'); window.location = 'allfriend.php';</script>";
        }
    }
?>