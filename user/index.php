<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>
<body>
        <?php include('../includes/header_visit.php'); ?>
        <div class="content">
        <section class="vh-100" style="background-color:">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-4 ">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="">
                    <div class="card-body p-5 text-center">
                        <form action="login.php" method="POST">
                        <div class="form-outline mb-4">
                            <input type="text" name="Username" class="form-control btn-lg" placeholder = "Username"/>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="Password" class="form-control btn-lg" placeholder = "Password" />
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg btn-block form-control">Login</button>
                            <hr class="my-4">
                            <button type="button" class="btn btn-lg btn-success form-control" onclick="location.href='register.php';">Register</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        </div>

        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>
</body>
</html>