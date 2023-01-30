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
    <title>Random Friend</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/docs.css" rel="stylesheet">
    <script src="../asset/js/bootstrap.bundle.min.js"></script>  
</head>
<body>
    <?php include('../includes/header_user.php'); ?>
    
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">เพื่อน</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item ">
                        <a href="following_main.php" class="nav-link text-white align-middle px-0">
                        <button type="button" class="btn btn-outline-info rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"></path>
                            </svg>
                        </button> 
                        <span class="ms-1 d-none d-sm-inline">หน้าหลัก</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="request.php" class="nav-link text-white align-middle px-0">
                        <button type="button" class="btn btn-outline-info rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                            </svg>
                        </button> 
                        <span class="ms-1 d-none d-sm-inline">คำขอเป็นเพื่อน</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="recomm.php" class="nav-link text-white align-middle px-0">
                        <button type="button" class="btn btn-outline-info rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button> 
                        <span class="ms-1 d-none d-sm-inline">การแนะนำ</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="allfriend.php" class="nav-link text-white align-middle px-0">
                        <button type="button" class="btn btn-outline-info rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                            </svg> 
                        </button> 
                        <span class="ms-1 d-none d-sm-inline">เพื่อนทั้งหมด</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
            <h4 class="section-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คนที่คุณอาจจะรู้จัก</h4>
            <br>
            <?php
                include('connection.php');
                $sql = "SELECT * FROM users WHERE USERID";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){?>
            <?php
                include('connection.php');
                $sql = "SELECT * FROM users order by RAND() LIMIT 10";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){?>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card-body card-one">
                                <div class="header">
                                    <div class="avatar">
                                        <img src="../asset/uploads/<?php echo $result['img'];?>" class="rounded-circle" width="70" height="70">
                                        &nbsp;&nbsp;
                                        <?php echo $result['Firstname']; ?>
                                        <?php echo $result['Lastname']; ?>
                                    </div>
                                </div>
                                <div class="footer">
                                    <br>
                                    <a href='addfriendrecomm.php?USERID=<?php echo $result['USERID']; ?>' class="btn btn-primary form-control"><center><h6>เพิ่มเพื่อน</h6></center></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?><?php } ?>       
        </div>
        </div>
</body>
</html>
<?php } ?>