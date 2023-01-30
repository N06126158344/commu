<header>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand"><b>SKNTC</b></a>
        <form class="d-flex">
        
        <a href = "user.php" style="color:white">หน้าแรก</a> &nbsp;&nbsp;&nbsp;
        <a href = "post.php" style="color:white">จัดการโพตส์</a> &nbsp;&nbsp;&nbsp;
        <a href = "profile.php" style="color:white">โปรไฟล์</a> &nbsp;&nbsp;&nbsp;
        <a href = "friend.php" style="color:white">รายชื่อผู้ใช้</a> &nbsp;&nbsp;&nbsp;
        <a href = "myfriend.php" style="color:white">เพื่อน</a> &nbsp;&nbsp;&nbsp;
        <a href = "allowfriend.php" style="color:white">คำขอเป็นเพื่อน</a> &nbsp;&nbsp;&nbsp;
        <a style="color:white" ><?php echo ($_SESSION["FIRSTNAME"]); ?> &nbsp;<?php echo ($_SESSION['LASTNAME']); ?></a>&nbsp;&nbsp;&nbsp;
        <a href = "logout.php" style="color:white">ออกจากระบบ</a>

        </form>
    </div>
    </nav>
</header>
