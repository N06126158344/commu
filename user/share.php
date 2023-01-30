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
    <title>SharePost</title>
</head>
<body>
<?php include('../includes/header_user.php'); ?>
<?php 
    include('connection.php');
    $POID = $_GET['POID'];
    $sql = "SELECT * FROM pouser WHERE POID = '$POID' ";
    $query = mysqli_query($conn, $sql);
    if($result = mysqli_fetch_array($query)){?>
        <div class="content">
        <section class="vh-100" style="background-color:">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="">
                    <div class="card-body p-5 text-center">
                        <form action="sharing.php" method="POST">
                        <div class="form-outline mb-4">
                            <h5><input type="text" name="Detail" class="form-control text-center" value="<?php echo $result['Detail']; ?>" disabled></h5>
                        </div>
                        <div class="form-outline mb-4">
                            <img src="../asset/uploads/<?php echo $result['Pimages'];?>" name="file" id ="file" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 300px; z-index: 1">
                        </div>
                        <div class="form-outline mb-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block form-control">POST</button>
                            <hr class="my-4">
                            <button type="button" class="btn btn-lg btn-danger form-control" onclick="location.href='register.php';">Close</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        </div>
<?php } ?>
</body>
</html>
<?php } ?>