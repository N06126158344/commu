<?php
session_start();
include 'connection.php';
$Firstname = $_POST["Firstname"];
$Lastname = $_POST["Lastname"];
$Email = $_POST["Email"];
$Username = $_POST['Username'];
$Date = $_POST['Date'];
$Sex = $_POST['Sex'];
$Location = $_POST['Location'];
$ME = $_POST['ME'];

$filename = basename($_FILES["file"]["name"]);
$targetDir = "../asset/uploads/";
$targetFilePath = $targetDir . $filename;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','jfif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "UPDATE users SET Firstname = '$Firstname', Lastname = '$Lastname', Email = '$Email'
            , Username = '$Username', Date = '$Date', Sex = '$Sex', Location = '$Location',  ME = '$ME', img = '$filename' WHERE USERID = '".$_SESSION["USERID"]."'";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "<script>alert('อัพเดตโปรไฟล์เรียบร้อยแล้ว'); window.location = 'editprofile.php';</script>";
            }

        }
    }
}
?> 