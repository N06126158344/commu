<?php 
  session_start();
  if(isset($_SESSION['USERID'])){
    header("location: users.php");
  }
?>
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
  <?php include('../includes/header_visit.php'); ?>  
  <div class="content">
    <section class="vh-100">
      <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-6 ">
          <div class="card shadow-2-strong" style="">
            <div class="card-body p-5">
            <form action="registering.php" method="POST" enctype="multipart/form-data" >
            <h3 class="mb-5">Register Form</h3>
                <div class="error-text"></div>
                <div class="row">
                  <div class="col form-outline mb-3">
                    <h6>First Name</h6>
                    <input type="text" name="Firstname" class="form-control btn-lg" placeholder = "Firstname"/>
                  </div>
                  <div class="col form-outline mb-3">
                    <h6>Last Name</h6>
                    <input type="text" name="Lastname" class="form-control btn-lg" placeholder = "Lastname" />        
                  </div>
              </div>
              <div class="form-outline mb-3">
                <h6>Username</h6>
                <input type="text" name="Username" class="form-control btn-lg" placeholder = "Enter your Username" />        
              </div>
              <div class="form-outline mb-3">
                <h6>Email Address</h6>
                <input type="text" name="Email" class="form-control btn-lg" placeholder = "Enter your Email" />        
              </div>
              <div class="form-outline mb-3">
                <h6>Password</h6>
                <input type="password" name="Password" class="form-control btn-lg" placeholder = "Enter your Password" />        
              </div>
              <div class="field input">
                <label>Date of birth</label>
                <input type="Date" name="Date" required>
              </div>
              <br>
              <div class="field image">
                <label>Select Image</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
              </div>
              <br>
              <button type="submit" name ="submit"  value ="Upload" class="btn btn-primary btn-lg form-control" >Register</button>
              <hr class="my-3">
              <button type="button" class="btn btn-lg btn-success form-control" onclick="location.href='index.php';">Sign in</button>
    
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