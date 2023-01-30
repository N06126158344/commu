<?php session_start(); ?>
<?php
if(!$_SESSION["USERID"]){
    header("location: manage_user.php");
}else{?>
<?php include("../../user/connection.php");?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../asset/css/docs.css" rel="stylesheet">
        <script src="../../asset/js/bootstrap.bundle.min.js"></script>
   </head>
   
   <?php include('../../includes/header_admin.php'); ?>
   <div class="content">
        <section class="vh-100" style="background-color:">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-6 ">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="">
                    <div class="card-body p-5 text-left">
                    <h3 class="mb-5">Register</h3>
                        <form action="addusers.php" method="POST" enctype="multipart/form-data" >
                        <hr class="my-3"><br>
                            <div class="row">
                                <div class="col form-outline mb-3">
                                    <input type="text" name="Firstname" class="form-control btn-lg" placeholder = "Firstname"/>
                                </div>
                                <div class="col form-outline mb-3">
                                    <input type="text" name="Lastname" class="form-control btn-lg" placeholder = "Lastname" />        
                                </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="email" name="Email" class="form-control btn-lg" placeholder = "Email" />        
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="text" name="Username" class="form-control btn-lg" placeholder = "Username" />        
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="Password" class="form-control btn-lg" placeholder = "Password" />        
                                </div>
                                <div class="form-outline mb-3">
                                    <h5>Date of birth</h5>
                                    <input type="date" name="Date" class="form-control btn-lg" placeholder = "Date" />        
                                </div>
                                <h5>Sex</h5>
                                <div class="row d-flex align-items-center h-100">
                                    <div class="col-4">
                                    <div class="card shadow-2-strong" style="">
                                    <div class="card-body p-5 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Sex" id="inlineRadio1" value="Man">
                                            <label class="form-check-label" for="inlineRadio1">Man</label>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-4">
                                    <div class="card shadow-2-strong" style="">
                                    <div class="card-body p-5 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Sex" id="inlineRadio2" value="Woman">
                                            <label class="form-check-label" for="inlineRadio2">Woman</label>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            <br>
                            <button type="submit" name ="submit"  value ="Upload" class="btn btn-primary btn-lg btn-block form-control">เพิ่มสมาชิก</button>
                        </form>
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