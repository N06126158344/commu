<?php

    session_start();
    include('connection.php');
    
    $POID = $_GET['POID'];
    $Username = $_POST['Username'];
    $comuser = $_POST['comuser'];
    $sql = "INSERT INTO comments(POID, USERID, Username, comuser) VALUES ('$POID', '".$_SESSION["USERID"]."', '$Username', '$comuser')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('คุณแสดงความคิดเห็นเรียบร้อยแล้ว'); window.location = 'postuser.php';</script>";
    }
?>
