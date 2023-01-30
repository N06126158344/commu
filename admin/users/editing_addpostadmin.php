<?php
session_start();
include '../../user/connection.php';
$POSTID = $_POST['POSTID'];
$TITLE = $_POST['TITLE'];
$DETAIL = $_POST['DETAIL'];
$DES = $_POST['DES'];

$filename1 = basename($_FILES["file1"]["name"]);
$filename2 = basename($_FILES["file2"]["name"]);
$filename3 = basename($_FILES["file3"]["name"]);
$filename4 = basename($_FILES["file4"]["name"]);
$targetDir = "../../asset/uploads/";
$targetFilePath1 = $targetDir . $filename1;
$targetFilePath2 = $targetDir . $filename2;
$targetFilePath3 = $targetDir . $filename3;
$targetFilePath4 = $targetDir . $filename4;
$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
$fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);
$fileType4 = pathinfo($targetFilePath4,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && !empty($_FILES["file1"]["name"])){
    if(isset($_POST["submit"]) && !empty($_FILES["file2"]["name"])){
        if(isset($_POST["submit"]) && !empty($_FILES["file3"]["name"])){ 
            if(isset($_POST["submit"]) && !empty($_FILES["file4"]["name"])){   
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf','jfif');
                if(in_array($fileType1, $allowTypes)){
                    if(move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFilePath1)){
                        if(in_array($fileType2, $allowTypes)){
                            if(move_uploaded_file($_FILES["file2"]["tmp_name"], $targetFilePath2)){
                                if(in_array($fileType3, $allowTypes)){
                                    if(move_uploaded_file($_FILES["file3"]["tmp_name"], $targetFilePath3)){
                                        if(in_array($fileType3, $allowTypes)){
                                            if(move_uploaded_file($_FILES["file4"]["tmp_name"], $targetFilePath4)){
                                                if(in_array($fileType4, $allowTypes)){
                                                    $sql = "UPDATE posts SET TITLE = '$TITLE', DETAIL = '$DETAIL' , PIMAGES1 = '$filename1', PIMAGES2 = '$filename2', PIMAGES3 = '$filename3', PIMAGES4 = '$filename4', DES = '$DES' WHERE POSTID = '$POSTID' AND USERID = '".$_SESSION["USERID"]."'";
                                                    $query = mysqli_query($conn, $sql);
                                                    if($query){
                                                        echo "<script>alert('แก้โพสต์เรียบร้อยแล้ว'); window.location = 'publish.php';</script>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?> 