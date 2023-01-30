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
<section class="vh-100" style="background-color: #DBDBDB;">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
      <?php 
          include('connection.php');
          $sql = "SELECT * FROM friends INNER JOIN users ON friends.FRIENDID = users.USERID WHERE ADDFRIEND = '2' AND YOURSELFID = '".$_SESSION["USERID"]."'";
          $query = mysqli_query($conn, $sql);
          if($row = mysqli_fetch_array($query)){?>
        <div class="card" id="chat1" style="border-radius: 15px;">
          <div
            class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <i class="fas fa-angle-left"></i>
            <p class="mb-0 fw-bold"><?php echo $row['Firstname']?></p>
            <i class="fas fa-times"></i>
          </div>
          <div class="card-body">

            <div class="d-flex flex-row justify-content-start mb-4">
              <?php
                getChats($conn);
              ?>
            </div>
            <div class="d-flex flex-row justify-content-end mb-4">
              <?php
                getComments($conn);
              ?>
            </div>

          <form action="chatt.php" method="POST">
            <div class="form-outline">
              <input type="text" name="inmsgID" value="<?php echo $row["USERID"]; ?>" hidden>
              <input type="text" name="outmsgID" value="<?php echo $_SESSION["USERID"]; ?>" hidden>
              <input type="text" name="detail" class="form-control btn-lg" placeholder = "Type a message here..."/><br>
              <button type="submit" class="btn btn-success float-end">ส่งข้อความ</button>
            </div>
          </form>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

  </div>
</section>
</body>
</html>
<?php } ?>
<?php
  function getChats($conn) {
    $sql = "SELECT * FROM chats order by RAND() LIMIT 1";
    $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo '<br>';
        echo '<div class="row justify-content-left align-items-left">';
        echo '<div class="col-xl-12">';
          echo '<div class="card mb-4 mb-xl-0">';
            echo '<div class="card-header">';
              echo '<img src="Rana.jfif" class="rounded-circle" alt="กบน้อย" width="50" height="50">';
              echo "&nbsp;&nbsp;";
                echo $row['ChatID']."<br>";
                echo $row['detail']."<br><br>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
      }
    }
?>

$sql = "SELECT * FROM chats LEFT JOIN users ON users.USERID = chats.USERID
WHERE (USERID = {$USERID} AND inmsgID = {$inmsgID})
OR (USERID = {$inmsgID} AND inmsgID = {$USERID}) ORDER BY ChatID";

