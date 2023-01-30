<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: index.php');
    }else{?>
<!DOCTYPE html>
<html>
    <head>
        <title>userpage</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php include('../includes/header_user.php'); ?>

        <div class="content">
            <div class="single">
            <div class = "row">
                        <div class = "col-1">
                        </div>
                        <div class = "col-10">
                    <table class=" table bg-light text-center table-striped">
                        <p>
                        <h2 align="center">รายชื่อผู้ใช้ทั้งหมดที่เพิ่มเพื่อนได้</h2>
                        <p>
                        <tr>
                            <td><h3>ชื่อ</h3></td>
                            <td><h3>นามสกุล</h3></td>
                            <td><h3><center>เพิ่มเพื่อน</center></h3></td>
                        </tr>
                        <?php 
                            include('connection.php');

                            $Firstname = $_GET['Firstname'];
                            $sql = "SELECT * FROM users WHERE FIRSTNAME LIKE '".$FIRSTNAME."%' AND USERID !='".$_SESSION["USERID"]."' AND USER_LEVEL != 'A'";
                            $query = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><h4><?php echo $result['Firstname']; ?></h4></td>
                            <td><h4><?php echo $result['Lastname']; ?></h4></td>
                            <td><a href='addfriend.php?USERID=<?php echo $result['USERID']; ?>' class="btn btn-primary"><center><h4>เพิ่มเพื่อน</h4></center></a></td>
                        </tr><?php } ?>
                            
                    </table>
                    </div>
            </div>
        </div>
    </body>
</html>
    <?php } ?>
