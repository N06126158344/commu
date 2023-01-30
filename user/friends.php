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
        <title>Search</title>
        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="../asset/css/docs.css" rel="stylesheet">
        <script src="../asset/js/bootstrap.bundle.min.js"></script>  
    </head>
    <body>
    <?php include('../includes/header_user.php'); ?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <h4 class="section-title">ค้นหาเพื่อน</h4>
            <form method="POST">
                <div class="d-flex">
                    <input type="text" name="Firstname" class="form-control btn-lg" placeholder="ค้นหา...">&nbsp;&nbsp;
                    <button type="submit" class="btn btn-success btn-lg btn-block" >ค้นหา</button>
                </div>
            </form>
        </div>
        </div>
    </div>

        <div class="content">
            <div class="single">
            <div class = "row">
                        <div class = "col-1">
                        </div>
                        <div class = "col-10">
                    <table class=" table bg-light text-center table-striped">
                        <p>
                        <h4 align="center">รายชื่อผู้ใช้ทั้งหมดที่เพิ่มเพื่อนได้</h4>
                        <p>
                        <tr>
                            <td><h4>ชื่อ</h4></td>
                            <td><h4>นามสกุล</h4></td>
                            <td><h4><center>เพิ่มเพื่อน</center></h4></td>
                        </tr>
                        <?php
                            include('connection.php');
                            if ($_POST) {
                                $Firstname = $_POST['Firstname'];
                                $sql = "SELECT * FROM users WHERE Firstname LIKE '%".$Firstname."%'";
                                $query = mysqli_query($conn, $sql);
                                while($result = mysqli_fetch_array($query)){
                            ?>
                        <tr>
                            <td><h5><?php echo $result['Firstname']; ?></h5></td>
                            <td><h5><?php echo $result['Lastname']; ?></h5></td>
                            <td><a href='addfriend.php?USERID=<?php echo $result['USERID']; ?>' class="btn btn-primary"><center><h5>เพิ่มเพื่อน</h5></center></a></td>
                        </tr><?php } } ?>
                            
                    </table>
                    </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>