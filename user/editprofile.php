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
  while($result = mysqli_fetch_array($query)){?>
    <form action="edit.php" method="POST" enctype="multipart/form-data">
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image -->
                        <img src="../asset/uploads/<?php echo $result['img'];?>" class="img-fluid" width="90%" height="90%" >
                        <!-- Profile picture help block -->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button -->
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                <input type="text" name="Username" class="form-control" value="<?php echo $result['Username']; ?>"/>  
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <!-- <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie"> -->
                                    <input type="text" name="Firstname" class="form-control" value="<?php echo $result['Firstname']; ?>" />
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <!-- <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna"> -->
                                    <input type="text" name="Lastname" class="form-control" value="<?php echo $result["Lastname"]; ?>" />
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Organization name</label><br>
                                    <!-- <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap"> -->
                                    <input type="hidden" name="USERLEVEL" value="<?php echo $result["USERLEVEL"]; ?>">
                                    <input type="text" class="form-control" disabled name="USERLEVEL" value="<?php echo $result["USERLEVEL"]; ?>">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <!-- <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA"> -->
                                    <input type="text" name="Location" class="form-control" value="<?php echo $result['Location']; ?>" />
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <!-- <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com"> -->
                                <input type="email" name="Email" class="form-control" value="<?php echo $result['Email']; ?>" />
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Sex</label>
                                    <!-- <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567"> -->
                                    <input type="text" name="Sex" class="form-control" value="<?php echo $result['Sex']; ?>" />
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <!-- <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988"> -->
                                    <input type="text" name="Date" class="form-control" value="<?php echo $result['Date']; ?>" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">About (how your about will appear to other users on the site)</label>
                                <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                <input type="text" name="ME" class="form-control" value="<?php echo $result['ME']; ?>"/>  
                            </div>
                            <!-- Save changes button-->
                            <button type="submit" name ="submit"  value ="Upload" class="btn btn-primary btn-block" >Save changes</button>
                            <button class="btn btn-danger" type="button" onclick="location.href='profile.php';">close changes</button>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    </form>
<?php } ?>
</body>
</html>
<?php } ?>