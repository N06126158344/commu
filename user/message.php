<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: index.php');
    }else{?>
<!DOCTYPE html>
<html>
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
    <br>
        <div class="content">
            <div class="single">
            <div class = "row">
                        <div class = "col-1">
                        </div>
                        <div class = "col-10">
                    <table class=" table bg-light text-center table-striped">
                        <p>
                        <h4 align="center">ข้อความจากการแจ้งเรื่อง</h4>
                        <p>
                        <tr>
                            <td><h4>ชื่อเรื่อง</h4></td>
                            <td><h4>เนื้อหา</h4></td>
                            <td><h4>สถานะ</h4></td>
                        </tr>
                        <?php
                            include('connection.php');
                            $sql = "SELECT * FROM conadmin WHERE Option = 'E' AND USERID = '".$_SESSION["USERID"]."'";
                            $query = mysqli_query($conn, $sql); 
                            while($result = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><h5><?php echo $result['Titlecon']; ?></h5></td>
                            <td><h5><?php echo $result['Detailcon']; ?></h5></td>
                            <td><h5>แก้ไขปัญหาที่แจ้งเรียบร้อยแล้ว</h5></a></td>
                        </tr><?php } ?>
                            
                    </table>
                    </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>