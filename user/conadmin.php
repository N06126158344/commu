<?php
    session_start();
    include('connection.php');

    $Titlecon = $_POST['Titlecon'];
    $Namecon = $_POST['Namecon'];
    $Emailcon = $_POST['Emailcon'];
    $Detailcon = $_POST['Detailcon'];

    $sql = "INSERT INTO conadmin(USERID,Titlecon,Namecon,Emailcon,Detailcon,Option) VALUES ('".$_SESSION["USERID"]."','$Titlecon','$Namecon','$Emailcon','$Detailcon','N')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('แจ้งเรื่องสำเร็จ'); window.location='contactweb.php';</script>";
    }
?>