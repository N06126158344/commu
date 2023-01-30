<?php

    session_start();
    include('connection.php');
    
    $POID = $_GET['POID'];
    $Username = $_POST['Username'];
    $comser = $_POST['comser'];
    $sql = "INSERT INTO commentsser(POID, USERID, Username, comser) VALUES ('$POID', '".$_SESSION["USERID"]."', '$Username', '$comser')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('คุณแสดงความคิดเห็นเรียบร้อยแล้ว'); window.location = 'mobile.php';</script>";
    }
?>
