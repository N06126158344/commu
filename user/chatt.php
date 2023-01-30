<?php
    session_start();
    include('connection.php');

    $USERID = $_SESSION["USERID"];
    $inmsgID = $_POST['inmsgID'];
    $detail = $_POST['detail'];
    $sql = "INSERT INTO chats(inmsgID, USERID, detail) VALUES ('$inmsgID', '$USERID', '$detail')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('ส่งข้อความแล้ว'); window.location = 'chat.php';</script>";
    }
?>