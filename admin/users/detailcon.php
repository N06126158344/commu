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
    <div class="content">
        <section class="vh-100" style="background-color:">
            <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-6 ">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="">
                    <div class="card-body p-5 text-center">
                    <?php
                            include('../../user/connection.php');

                            $CONID = $_GET['CONID'];
                            $sql = "SELECT * FROM conadmin WHERE CONID = '$CONID'";
                            $query = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_array($query)){
                         ?>
                        <h2>รายละเอียด</h2>
                        <br>
                        <input type="hidden" name="CONID" value="<?php echo $result['CONID']; ?>">
                        <textarea type="text" name="Detailcon" class="form-control btn-lg"  value=""><?php echo $result['Detailcon']; ?></textarea>
                        <br>
                        <hr class="my-3">
                        <button type="button" class="btn btn-lg btn-danger form-control" onclick="location.href='contactuser.php';">ยกเลิก</button>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
    </body>
</html>
<?php } ?>