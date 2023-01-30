<?php
    include('connection.php');

    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Date = $_POST['Date'];

    $sql = "INSERT INTO users(Firstname,Lastname,Email,Username,Password,Date,USERLEVEL) VALUES ('$Firstname','$Lastname','$Email','$Username','$Password','$Date','W')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('รอการอนุมัติจาก Admin'); window.location='visit_index.php';</script>";
    }
?>