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
                        <th>USERID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>EMAIL</th>
                        <th>DATE</th>
                        <th>SEX</th>
                        <th>USERLEVEL</th>
                        <th colspan="2">ACTION</th>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM users WHERE USERLEVEL = 'U'";
                    $query = mysqli_query($conn, $sql);
                    ?>
                    <?php
                    while($result=mysqli_fetch_array($query))
                    {
                    ?>
                        <form action="edit.php" method=post>
                            <tr>
                                <td><input type="hidden" name="USERID" class="text-center text-align" value=<?php echo$result["USERID"]?>><?php echo$result["USERID"]?></td>
                                <td><input type="text" name="Username" class="text-center text-align" value=<?php echo$result["Username"]?> ></td>
                                <td><input type="password" name="Password" class="text-center text-align" value=<?php echo$result["Password"]?>></td>
                                <td><input type="text" name="Firstname" class="text-center text-align" value=<?php echo$result["Firstname"]?>></td>
                                <td><input type="text" name="Lastname" class="text-center text-align" value=<?php echo$result["Lastname"]?>></td>
                                <td><input type="text" name="Email" class="text-center text-align" value=<?php echo$result["Email"]?>></td>
                                <td><input type="date" name="Date" class="text-center text-align" value=<?php echo$result["Date"]?>></td>
                                <td><input type="text" name="Sex" class="text-center text-align" value=<?php echo$result["Sex"]?>></td>
                                <td><select class="form-select" aria-label="Default select example" name = "USERLEVEL">
                                <option value="U">อนุมัติแล้ว</option>
                                <option value="W">ยกเลิก</option>
                                </select></td>
                                <td><button type="submit" class="btn btn-success">EDIT</button></td>
                                <td><a href="delete.php?USERID=<?php echo($result["USERID"])?>" class="btn btn-danger">DELETE</a></td>
                            </tr>
                        </form>
                    <?php
                    }
                    ?>
                    </table>
                </body>
            </div>
        </div>
    </body>
</html>
    <?php } ?>