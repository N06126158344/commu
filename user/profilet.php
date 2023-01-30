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
    <title>Document</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/docs.css" rel="stylesheet">
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <?php 
            include('connection.php');
            $sql = "SELECT * FROM users WHERE USERID = '".$_SESSION["USERID"]."'";
            $query = mysqli_query($conn, $sql);
            if($result = mysqli_fetch_array($query)){?>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
          <h3 class="mb-5">Edit Profile</h3>
            <div class="text-center">
            <img src="../asset/uploads/<?php echo $result['img']; ?>" class="img-fluid" width="10%" height="10%" >
            <p>
            </div>
            <div class="input-group mb-3">
              <input type="file" name="file"/>
            </div>
            <div class="form-outline mb-3">
              <input type="text" name="Username" class="form-control btn-lg" value="<?php echo $result['Username']; ?>"/>
            </div>
            <div class="form-outline mb-3">
              <input type="text" name="Firstname" class="form-control btn-lg" value="<?php echo $result['Firstname']; ?>" />        
            </div>
            <div class="form-outline mb-3">
              <input type="text" name="Lastname" class="form-control btn-lg" value="<?php echo $result["Lastname"]; ?>" />        
            </div>
            <div class="form-outline mb-3">
              <input type="email" name="Email" class="form-control btn-lg" value="<?php echo $result['Email']; ?>" />        
            </div>
            <div class="form-outline mb-3   ">
              <input type="text" name="Location" class="form-control btn-lg" value="<?php echo $result['Location']; ?>" />        
            </div>
            <div class="form-outline mb-3   ">
              <input type="text" name="Date" class="form-control btn-lg" value="<?php echo $result['Date']; ?>" />        
            </div>
            <div class="form-outline mb-3   ">
              <input type="text" name="Sex" class="form-control btn-lg" value="<?php echo $result['Sex']; ?>" />        
            </div>
            <br>
            <button type="submit" name ="submit"  value ="Upload" class="btn btn-primary btn-lg btn-block" >SAVE</button>
        </form>
        <?php } ?>
</body>
</html>
<?php } ?>