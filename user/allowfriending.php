<?php
    session_start();
    include('connection.php');

    $USERID = $_GET['YOURSELFID'];
    $sql = "UPDATE friends SET ADDFRIEND = '2' WHERE YOURSELFID = '$USERID'";
    $query = mysqli_query($conn, $sql);
    $sql1 = "INSERT INTO friends(FRIENDID, YOURSELFID, ADDFRIEND) 
    VALUES('$USERID', '".$_SESSION["USERID"]."', '2')";
    $query1 =  mysqli_query($conn, $sql1);
    if($query){
        if($query1){
            echo "<script>alert('คุณได้ตอบรับคำขอเรียบร้อยแล้ว'); window.location = 'following.php';</script>";
        }   
    }
?>