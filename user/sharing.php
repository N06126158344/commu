<?php
session_start();
include 'connection.php';
$Detail = $_POST['Detail'];

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
            $sql = "INSERT INTO pouser(USERID, Detail, Pimages) VALUES('".$_SESSION["USERID"]."', '$Detail', '$filename')";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "<script>alert('คุณได้ตั้งกระทู้เรียบร้อยแล้ว'); window.location = 'postuser.php';</script>";
            }

        }
    }
}
?> 