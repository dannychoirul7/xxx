<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/select2.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offset-4">
            <div id="jam"></div>
            <?php
            $nama = $_SESSION["username"];

            $tanggal = mktime(date('m'), date("d"), date('Y'));
            date_default_timezone_set("Asia/Jakarta");
            $a = date("H");
            if (($a >= 6) && ($a <= 11)) {
                echo "Selamat Pagi <b>$nama</b>";
            } else if (($a >= 11) && ($a <= 15)) {
                echo "Selamat Siang <b>$nama</b>";
            } else if (($a > 15) && ($a <= 18)) {
                echo "Selamat Sore <b>$nama</b>";
            } else {
                echo "Selamat Malam <b>$nama</b>";
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php $level = $_SESSION['level'] == 'nol';
                if ($level) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Link</a>
                    </li>
                <?php   }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../profile.php">Profile</a>
                        <a class="dropdown-item" href="../logout.php">Keluar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</head>



<body>