<!DOCTYPE html>
<html>
    <head>
        <title>userpage</title>
        <meta charset="UTF-8">
    </head>
    <body>
    
    <?php include('asset/includes/header-user.php'); ?>
            <div class="row">
                
            <div class="col-3">
                
            </div>
            <div class="col-6">
                    <h2 class="section-title">ค้นหาเพื่อน</h2>
                    <form action="search.php" method="GET">
                    <input type="text" name="FIRSTNAME" class="form-control btn-lg" placeholder="ค้นหา...">
                    </form>
            </div>
            
            </div>
            </div>
            </div>
             <?php 
            include('connection.php');
            
            $sql = "SELECT * FROM posts INNER JOIN users ON posts.USERID = users.USERID
            GROUP BY POSTID DESC";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_array($query)){?>
            <br>
            <div class="content">
            <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
            <div class="card" style="width: 100%;">
                
                <div class = "text-center">
                <p><h1 class="card-title"><?php echo $result['FIRSTNAME']; ?> <?php echo $result['LASTNAME']; ?> </h1></p>
                <img src="asset/uploads/<?php echo $result['PIMAGES']; ?>" class="img-fluid" width="90%" height="90%" >
                </div>
                
                <div class="card-body">
                   
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['TITLE']; ?></h2>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Time : " . date("d/m/Y") . "<br>";?>
                    <h3><p class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['DETAIL']; ?></p></h3><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="single.php?POSTID=<?php echo $result['POSTID']; ?>" class="btn btn-primary btn-lg">Comment</a><br>
                </div>
            </div>
            </div>
            </div><?php } ?>
            </div>
            
    </body>
</html>