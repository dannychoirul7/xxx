<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eee;
        }

        .row {
            margin: 100px auto;
            width: 300px;
            text-align: center;
        }

        .login {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">

            <div class="login">
                <p>Profile anda dengan detail sebagai berikut:</p>
                <p>Username: <?php echo $_SESSION['username']; ?><br>
                    Level: <?php echo $_SESSION['level']; ?></p>
                <p><a href="index.php" class="btn btn-primary">Kembali</a></p>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>