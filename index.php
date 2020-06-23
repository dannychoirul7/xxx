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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/jqClock.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"> -->

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
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Keluar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Data </div>
            <div class="list-group list-group-flush">
                <a href="opd/index.php" class="list-group-item list-group-item-action bg-light">Daftar OPD</a>
                <a href="ip/index.php" class="list-group-item list-group-item-action bg-light">Data IP</a>
                <a href="vlan/index.php" class="list-group-item list-group-item-action bg-light">Data Vlan</a>
                <a href="perangkat/index.php" class="list-group-item list-group-item-action bg-light">Data Perangkat</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <center>
                <h1>LoL</h1>

                <a href="master_vlan/">
                    <img src="img/gambar.jpeg" class="rounded-circle border border-dark">
                </a>
            </center>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="../assets/js/popper.min.js"></script> -->
    <!-- <script src="../assets/js/bootstrap.js"></script> -->
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/datatables.min.js"></script> -->
    <script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="assets/js/jqClock.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#jam").clock({
                "langSet": "id",
                "timeFormat": ", %Pukul% H:i:s "
            });
        });
    </script>

    <!-- Menu Toggle Script -->
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>