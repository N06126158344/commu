<?php session_start(); ?>
<?php
    if(!$_SESSION["USERID"]){
        header('location: ../../includes/index.php');
    }else{?>
<!DOCTYPE html>
<html>
    <head>
        <title>userpage</title>
        <meta charset="UTF-8">
        <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../asset/css/docs.css" rel="stylesheet">
        <script src="../../asset/js/bootstrap.bundle.min.js"></script>
    <body>
    <?php include('../../includes/header_admin.php'); ?>

        <div class="content">
            <div class="row">
                <div class="col-1">
                 </div>
                <div class="col-6">
                    <br>
                    <h2>หัวข้อประกาศเซิร์ฟเวอร์เกม</h2>
                    <form action='addpostadmin.php' method="POST" enctype="multipart/form-data">
                        <input type="text" name="TITLE" class="form-control btn-lg" placeholder = "..." />
                        <br>
                        <h3>ชื่อเซิร์ฟเวอร์เกม</h3>
                        <input type="text" name="DETAIL" class="form-control btn-lg" placeholder = "..." />
                        <br>
                        <h3>เฟซบุ๊ก</h3>
                        <input type="text" name="FAC" class="form-control btn-lg" placeholder = "..." />
                        <br>
                        <h3>ดิสคอร์ด</h3>
                        <input type="text" name="DIS" class="form-control btn-lg" placeholder = "..." />
                        <br>
                        <h3>รายละเอียดเซิร์ฟเวอร์</h3>
                        <textarea maxlength="255" rows="10" cols="50" type="text" name="DES" class="form-control btn-lg"></textarea><br><p>
                        <input type="file" name="file1" id ="file1" /> 
                        <input type="file" name="file2" id ="file2" />
                        <input type="file" name="file3" id ="file3" />
                        <input type="file" name="file4" id ="file4" />
                        <br><br>
                        <button type="submit" name ="submit"  value ="Upload" class="btn btn-lg align btn-primary">โพสต์</button>
                   </form>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-4">
                    <br>
                        <h2 class="section-title">จัดการโพสต์</h2> 
                        <br>
                        <div class="col-6">
                        <form class="d-flex" role="search" method="POST">
                            <input class="form-control me-2" type="search" name="TITLE" placeholder="Search" aria-label="Search">
                            <button type="button" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                            </button>
                        </form>
                        </div>
                        <br>
                        <div class="col-8">
                        <div class="card shadow p-3 mb-5 bg-white rounded" style="">
                        <table class=" table bg-light text-center table-striped">
                        <thead>
                            <th>ชื่อเซิร์ฟเวอร์</th>
                            <th colspan="2">จัดการโพสต์</th>
                        </thead>
                        <?php
                            include('../../user/connection.php');
                            if ($_POST) {
                                $TITLE = $_POST['TITLE'];
                                $sql = "SELECT * FROM posts INNER JOIN users ON posts.USERID = users.USERID WHERE TITLE LIKE '%".$TITLE."%'";
                                $query = mysqli_query($conn, $sql);
                                while($result = mysqli_fetch_array($query)){
                            ?>
                            <form action="edit_addpostadmin.php" method="POST">
                            <tr>
                                <td><input type="hidden" name="TITLE" class="text-center text-align" value=<?php echo$result["TITLE"]?>><?php echo$result["TITLE"]?></td>
                                <td><a href="edit_addpostadmin.php?POSTID=<?php echo($result["POSTID"])?>" class="btn btn-warning">แก้ไขโพสต์</a></td>
                                <td><a href="deletepost.php?POSTID=<?php echo($result["POSTID"])?>" class="btn btn-danger">ลบโพสต์</a></td>
                                </tr>
                            </form>
                        <?php } } ?>
                        <thead>
                            <th>ชื่อเซิร์ฟเวอร์</th>
                            <th colspan="2">จัดการโพสต์</th>
                        </thead>
                        <?php
                            include('../../user/connection.php');
                            $sql = "SELECT * FROM posts WHERE USERID = '".$_SESSION["USERID"]."' ORDER BY POSTID DESC";
                            $query = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_array($query)){?>
                            <tr>
                                <td><input type="hidden" name="TITLE" class="text-center text-align" value=<?php echo$result["TITLE"]?>><?php echo$result["TITLE"]?></td>
                                <td><a href="edit_addpostadmin.php?POSTID=<?php echo($result["POSTID"])?>" class="btn btn-warning">แก้ไขโพสต์</a></td>
                                <td><a href="deletepost.php?POSTID=<?php echo($result["POSTID"])?>" class="btn btn-danger">ลบโพสต์</a></td>
                            </tr>
                        <?php } ?>
                        </div>
                        </div>
                        </table>
            </div>
        </div>
    </body>
</html>
<?php } ?>