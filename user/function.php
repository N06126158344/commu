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
</head>
<body>
    <?php
        include('connection.php');
        $sql = "SELECT * FROM users WHERE USERID = '".$_SESSION["USERID"]."'";
        $query = mysqli_query($conn, $sql);
        while($result = mysqli_fetch_array($query)){?>
        FIRSTNAME : <?php unset ($_SESSION["Firstname"])?><br>
        USERID : <?php echo $result['USERID']?><br>
        USERID :<?php unset ($_SESSION["USERID"]); ?>
    <?php } ?>
</body>
</html>
<?php } ?>