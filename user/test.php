<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: index.php');
    }else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/docs.css" rel="stylesheet">
    <script src="../asset/js/bootstrap.bundle.min.js"></script>  
</head>
<body>
    <?php include('../includes/header_user.php'); ?>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <h4 class="section-title">คำขอเป็นเพื่อน</h4>
            <br>
            <?php
                include('connection.php');
                $sql = "SELECT * FROM users WHERE USERID = '".$_SESSION["USERID"]."'";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){?>
            <?php 
                include('connection.php');

                $sql = "SELECT * FROM friends INNER JOIN users ON friends.YOURSELFID = users.USERID WHERE ADDFRIEND = '1' AND FRIENDID = '".$_SESSION["USERID"]."'";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){?>
            <div class="d-flex">
            <div class="col-3">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded text-left" style="">
            
                <div class="form-outline mb-4">
                    <img src="../asset/uploads/<?php echo $result['img'];?>" class="rounded-circle" width="70" height="70">
                    &nbsp;&nbsp;
                    <?php echo $result['Firstname']; ?>
                    <?php echo $result['Lastname']; ?>
                </div>
                <div class="form-outline mb-4">
                    <a href='allowfriending.php?YOURSELFID=<?php echo $result['YOURSELFID']; ?>' class="btn btn-primary"><center><h6>ตอบรับคำขอ</h6></center></a>
                    <a href='unallowfriend.php?FRIENDID=<?php echo $result['FRIENDID']; ?>' class="btn btn-danger"><center><h6>ปฏิเสธคำขอ</h6></center></a>
                </div>
            </div>
            </div>
            </div>
            <?php } ?><?php } ?>
        </div>
        </div>
    </div>
    
</body>
</html>
<?php } ?>