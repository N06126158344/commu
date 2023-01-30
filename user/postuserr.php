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
<?php include('../includes/header_user.php'); ?>
<?php
  include('connection.php');
  $sql = "SELECT * FROM users WHERE USERID = '".$_SESSION["USERID"]."'";
  $query = mysqli_query($conn, $sql);
  if($result = mysqli_fetch_array($query)){?>
  <div class="container-xl px-4 mt-4">
    <div class="row justify-content-center align-items-center">
    <div class="col-xl-8">
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body text-center">
            <div class="row gx-3 mb-3">
                <div class="col-md-2">
                  <img src="Rana.jfif" class="rounded-circle" alt="ช้างน้อยน่ารัก" width="70" height="70">
                </div>
                <div class="col-md-10">
                  <button type="button" class="btn btn-secondary form-control btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">
                    คุณกำลังคิดอะไรอยู่ <?php echo $result['Username']; ?>
                  </button>
                </div> 
            </div>
          </div>
      </div>
    </div>
    </div>
  </div>

<!-- The Modal -->
<form action='addpost.php' method="POST" enctype="multipart/form-data"> 
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">My Post</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <h3>หัวกระทู้</h3>            
            <textarea type="text" name="Title" class="form-control btn-lg"></textarea>
            <br>
            <h3>กระทู้</h3>
            <textarea type="text" name="Detail" class="form-control btn-lg"></textarea>
            <br>
            <input type="file" name="file" id ="file" /> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name ="submit"  value ="Upload" class="btn btn-primary">โพสต์</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</form>
<?php } ?>  
<?php 
    include('connection.php');
    $sql = "SELECT * FROM pouser INNER JOIN users ON pouser.USERID = users.USERID GROUP BY POID DESC";
    $query = mysqli_query($conn, $sql);
    while($result = mysqli_fetch_array($query)){  
    $POID = $result['POID'];?>
    <div class="container-xl px-4 mt-4">
    <div class="row justify-content-center align-items-center">
    <div class="col-xl-8">
      <div class="card mb-4 mb-xl-0">
        <div class="card-header">
          <img src="../asset/uploads/<?php echo $result['img'];?>" class="rounded-circle" width="50" height="50">
          &nbsp;&nbsp;
          <?php echo $result['Username'];?>
          <br><br>
          <?php echo $result['Detail']; ?>
        </div>  
          <div class="card-body text-center">
            <div class="row gx-3 mb-3">
                <div class="col-md-12">
                <!-- <img src="../asset/uploads/<?php echo $result['img'];?>" class="rounded-circle" alt="<?php echo $result['Username'];?>" width="50" height="50"> -->
                </div>
                <div class="col-md-10">
                  
                </div>
            </div>
          </div>
          <div class="card-body text-center">
          <div class="row gx-3 mb-3">
            <div class="col-md-12">
            <img src="../asset/uploads/<?php echo $result['Pimages'];?>" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 300px; z-index: 1">
            </div>
            <hr class="my-3">
            <div class="content">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-4 col-lg-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                      <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                    </svg>
                    ถูกใจ
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                  แสดงความคิดเเห็น
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-all" viewBox="0 0 16 16">
                    <path d="M8.098 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L8.8 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L4.114 8.254a.502.502 0 0 0-.042-.028.147.147 0 0 1 0-.252.497.497 0 0 0 .042-.028l3.984-2.933zM9.3 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
                    <path d="M5.232 4.293a.5.5 0 0 0-.7-.106L.54 7.127a1.147 1.147 0 0 0 0 1.946l3.994 2.94a.5.5 0 1 0 .593-.805L1.114 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.5.5 0 0 0 .042-.028l4.012-2.954a.5.5 0 0 0 .106-.699z"/>
                  </svg>
                  แชร์
                </div>
                <hr class="my-3"><br>
                  <form action='comments.php?POID=<?php echo $result['POID']; ?>' method="POST" enctype="multipart/form-data">
                    <div class="row justify-content-left align-items-left">
                    <div class="row">
                        <div class="col-2">
                          <img src="Rana.jfif" class="rounded-circle" alt="กบน้อย" width="50" height="50">
                        </div>
                        <div class="col-8">
                          <input type="hidden" name="Username" class="form-control btn-lg" value="<?php echo $result['Username']; ?>"/>
                          <input type="text" name="comuser" class="form-control" placeholder = "ความคิดเห็น..." />
                        </div>
                        <div class="col-2">
                          <button type="submit" class="btn btn-success btn-lg btn-block form-control"><h6>คอมเม้นต์</h6></button>
                        </div>
                    </div>
                    </div>
                  </form>                      
              </form>
            </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    </div>
    </div> 
<?php
    include('connection.php');
    $sql2 = "SELECT *  FROM comments LEFT JOIN users on comments.USERID = users.USERID where POID = '$POID'";
    $query2 = mysqli_query($conn, $sql2);
    while($result2 = mysqli_fetch_array($query2)){?>
    <div class="container px-4">
    <div class="row justify-content-center align-items-center">
    <div class="col-xl-8">
      <div class="card mb-4 mb-xl-0">
        <div class="card-header">
          <img src="../asset/uploads/<?php echo $result['img'];?>" class="rounded-circle" width="50" height="50">
          &nbsp;&nbsp;
          <?php echo $result2['Username'];?>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result2['comuser']; ?>
        </div>  
      </div>
    </div>
    </div>
    </div>
  </div>
<?php } ?>
</body>
</html>
<?php } ?><?php } ?>