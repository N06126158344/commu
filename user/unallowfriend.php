<?php
    session_start();
    include('connection.php');

    $USERID = $_GET['FRIENDID'];
    $sql = "DELETE FROM friends WHERE FRIENDID = '$USERID'";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('คุณได้ปฏิเสธคำขอเรียบร้อยแล้ว'); window.location = 'following.php';</script>";
    }
?>