<?php
    session_start();
    include('connection.php');

    $USERID = $_GET['USERID'];
    $sql = "INSERT INTO friends(FRIENDID, YOURSELFID, ADDFRIEND) VALUES ('$USERID', '".$_SESSION["USERID"]."', '1')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('เพิ่มเพื่อนเรียบร้อยแล้ว'); window.location = 'recomm.php';</script>";
    }
?>