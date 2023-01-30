<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: ../../includes/index.php');
    }else{?>
<?php include("../../user/connection.php");?>
<!DOCTYPE html>
<html>
    <head>
        <title>userpage</title>
        <meta charset="UTF-8">
        <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../asset/css/docs.css" rel="stylesheet">
        <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php include('../../includes/header_admin.php'); ?>
    <div class="admincontent">
            <div class="content">
            <br><h2 class="page-title text-center">Manage User</h2><br>
                <body>
                <table class="table bg-light text-center table-striped">
                    <thead>
                        <!-- <th>ไอดี</th> -->
                        <th>หัวเรื่อง</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>รายละเอียด</th>
                        <th colspan="3">ACTION</th>
                    </thead>
                    <?php 
                        include('../../user/connection.php');
                        $sql = "SELECT * FROM conadmin INNER JOIN users ON conadmin.CONID = users.USERID WHERE CONID";
                        $query = mysqli_query($conn, $sql); 
                        while($result = mysqli_fetch_array($query)){?>
                        <form action="edit.php" method=POST>
                            <tr>
                                <td><input type="hidden" name="CONID" class="text-center text-align" value=<?php echo$result["CONID"]?>><?php echo$result["CONID"]?></td>
                                <td><input type="text" name="Titlecon" class="text-center text-align" value=<?php echo$result["Titlecon"]?> ></td>
                                <td><input type="text" name="Namecon" class="text-center text-align" value=<?php echo$result["Namecon"]?>></td>
                                <td><a href="detailcon.php?CONID=<?php echo($result["CONID"])?>" class="btn btn-success">ดูรายละเอียด</a></td>
                                <td><select class="form-select" aria-label="Default select example" name="Option">
                                    <option value="N">ยังไม่ได้แก้ไข</option>
                                    <option value="E">แก้ไขแล้ว</option>
                                </select></td> 
                                <td><button type="submit" type="Upload" class="btn btn-success">SUCCESS</button></td>
                                <td><a href="deletecon.php?CONID=<?php echo($result["CONID"])?>" class="btn btn-danger">DELETE</a></td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>
    <?php } ?>