<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $username;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) { // bandingkan password inputan dengan database

            //multilevel user
            if ($row["level"] == "nol") {
                $_SESSION["level"] = "nol";
                header("Location:index.php");
                $_SESSION["login"] = true;
                exit;
            } else if ($row["level"] == "satu") {
                $_SESSION["level"] = "satu";
                header("Location:index.php");
                $_SESSION["login"] = true;
                exit;
            } else if ($row["level"] == "dua") {
                $_SESSION["level"] = "dua";
                header("Location:index.php");
                $_SESSION["login"] = true;
                exit;
            }
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login form shake effect</title>
    <link rel='stylesheet prefetch' href='assets/css/font-awesome.min.css'>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <form action="" method="post">
        <div class="login-form">

            <?php if (isset($error)) : ?>
                <p style="color: red; font-style:italic; text-align: center;">username / password salah</p>
            <?php endif; ?>
            <h2>
                <center>Login</center>
            </h2>
            <div class="form-group ">
                <input type="text" class="form-control" name="username" placeholder="Username " id="username">

            </div>
            <div class="form-group log-status">
                <input type="password" class="form-control" name="password" placeholder="Password" id="password">

            </div>
            <span class="alert">Invalid Credentials</span>
            <a class="link" href="">Lost your password?</a>
            <button type="submit" name="login" class="log-btn">Log in</button>

        </div>
    </form>
</body>

</html>