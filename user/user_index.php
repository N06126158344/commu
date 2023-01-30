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
    <title>Website Community</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/docs.css" rel="stylesheet">
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include('../includes/header_user.php'); ?>
    <?php 
            include('connection.php');
            
            $sql = "SELECT * FROM posts INNER JOIN users ON posts.USERID = users.USERID
            GROUP BY POSTID DESC";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_array($query)){?>
            <br>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <!-- การสร้าง Carousel -->
                <div class="carousel slide" id="slider1" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <button  data-bs-target="#slider1" data-bs-slide-to="0"></button>
                            <button  data-bs-target="#slider1" data-bs-slide-to="1"></button>
                            <button  class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>
                            <button  data-bs-target="#slider1" data-bs-slide-to="3"></button>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="../asset/uploads/<?php echo $result['PIMAGES1']; ?>" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../asset/uploads/<?php echo $result['PIMAGES2']; ?>" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <img src="../asset/uploads/<?php echo $result['PIMAGES3']; ?>" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../asset/uploads/<?php echo $result['PIMAGES4']; ?>" class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                        <!-- ควบคุมการ Slide ผ่านปุ่ม -->
                        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider1">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider1">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-8 ">
                <div class="shadow p-3 mb-5 bg-white rounded" style="">
                <div class="card-body p-5 text-left">
                    <button class="btn btn-success" 
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse-content">ดูข้อมูลเพิ่มเติม</button>  
                    <br>
                        <div id="collapse-content" class="collapse my-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-3 p-md-4 border rounded-3 icon-demo-examples">
                                        <div class="fs-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hdd-rack" viewBox="0 0 16 16">
                                            <path d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm2 7a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                            <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1v2H2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2h-1V7h1a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm0 7v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-3-4v2H4V7h8z"/>
                                        </svg>
                                        <?php echo $result['TITLE']; ?>
                                        </div>   
                                        <div class="fs-2 mb-3">
                                        <div class="col-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                                </svg>
                                                &nbsp;
                                                Name Games
                                            </span>
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value=<?php echo $result['DETAIL']; ?>>
                                        </div>
                                        </div>
                                        <h5><b>คำอธิบาย</b></h5>
                                        <div class="fs-2 mb-3"><h6>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                            </svg>
                                            &nbsp;&nbsp;<?php echo $result['FAC']; ?>
                                        </h6></div>
                                        <div class="fs-2 mb-3"><h6>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                                <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                                            </svg>
                                            &nbsp;&nbsp;<?php echo $result['DIS']; ?>
                                        </h6></div>
                                        <h5><b>รายละเอียดเกม</b></h5>
                                        <h6><?php echo $result['DES']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div><?php } ?>
</body>
</html>
<?php } ?>