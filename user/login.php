<?php
    session_start();
    include('connection.php');

    $sql = "SELECT * FROM users WHERE Username = '".$_POST["Username"]."' AND Password = '".$_POST["Password"]."'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)==1) {
        $result = mysqli_fetch_array($query);

        $_SESSION["USERID"] = $result['USERID'];
        $_SESSION["Firstname"] = $result['Firstname'];
        $_SESSION["Lastname"] = $result['Lastname'];
        $_SESSION["Email"] = $result['Email'];
        $_SESSION["Username"] = $result['Username'];
        $_SESSION["Password"] = $result['Password'];
        $_SESSION["Date"] = $result['Date'];
        $_SESSION["Sex"] = $result['Sex'];
        $_SESSION["USERLEVEL"] = $result['USERLEVEL'];

        if ($_SESSION['USERLEVEL']=="A") {
            header('location: ../admin/users/manage_user.php');
        }
        if ($_SESSION['USERLEVEL']=="U") {
            header('location: user_index.php');
        }
        if ($_SESSION['USERLEVEL']=="W") {
            echo "<script>alert('กรุณารอการอนุมัติจาก Admin'); window.location='visit_index.php';</script>";
        }
    } else {
        echo "<script>alert('USERNAME หรือ PASSWORD ของคุณผิด'); window.location='visit_index.php';</script>";
    }
?>