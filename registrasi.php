<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

if (isset($_POST["daftar"])) {
    if (daftar($_POST) > 0) {
        echo "<script> alert('user berhasil di tambahkan');</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>


    <h1 style="text-align: center;">Tambah User</h1>

    <form action="" method="post">

        <div class="form-group col-md-4 offset-4">
            <label for="nama_opd">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group col-md-4 offset-4">
            <label for="alamat_opd">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group col-md-4 offset-4">
            <label for="alamat_opd">Password Ulang</label>
            <input type="password" class="form-control" id="password2" name="password2" required>
        </div>
        <div class="form-group col-md-4 offset-4">
            <label>Level</label>
            <div class="input-group">
                <select name="level" id="level" class="form-control" required>
                    <option value="">Silahkan pilih level</option>
                    <!-- <option value="nol">nol</option> -->
                    <option value="satu">satu</option>
                    <option value="dua">dua</option>
                    <option value="tiga">tiga</option>

                </select>
            </div>
        </div>
        <div class="offset-4">
            <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
            <a class="btn btn-danger" href="index.php" role="button">Batal</a>
        </div>

    </form>
    <script type="text/javascript" href="../assets/js/bootstrap.min.js"></script>
</body>


</html>