<?php
    session_start();
    include('connection.php');
    
    $POID = $_GET['POID'];
    $comments = $_POST['comments'];
    $sql = "INSERT INTO comments(POID, USERID, comments) VALUES ('$POID', '".$_SESSION["USERID"]."', '$comments')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('คุณแสดงความคิดเห็นเรียบร้อยแล้ว'); window.location = 'postuser.php';</script>";
    }
?>
