<!-- <p>Connect to page</p>
echo "<script>alert('Connect to page'); window.location='user_index.php';</script>"; -->
<?php
session_start();
include '../../user/connection.php';
$TITLE = $_POST['TITLE'];
$DETAIL = $_POST['DETAIL'];
$FAC = $_POST['FAC'];
$DIS = $_POST['DIS'];
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
                                                    $sql = "INSERT INTO posts(USERID, TITLE, DETAIL, FAC, DIS, DES, PIMAGES1, PIMAGES2, PIMAGES3, PIMAGES4) VALUES('".$_SESSION["USERID"]."', '$TITLE', '$DETAIL', '$FAC', '$DIS', '$DES', '$filename1', '$filename2', '$filename3', '$filename4')";
                                                    $query = mysqli_query($conn, $sql);
                                                    if($query){
                                                        echo "<script>alert('คุณได้โพสต์เรียบร้อยแล้ว'); window.location = 'publish.php';</script>";
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