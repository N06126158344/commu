<?php
    session_start();
    include('connection.php');

    $POID = $_GET['POID'];
    $USERID = $_GET['USERID'];
    $sql = "INSERT INTO good(GoodID, USERID, POID, Gooddetail) VALUES ('$USERID', '".$_SESSION["USERID"]."', $POID, '1')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('ไลค์โพสต์เรียบร้อยแล้ว'); window.location = 'postuser.php';</script>";
    }
?>