<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");
// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    var_dump($_POST);



    // data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data masuk');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal');
        document.location.href = 'tambah.php';
        </script>";
    }
}
?>
<h1 style="text-align: center;">Tambah Data IP</h1>

<form action="" method="post">

    <div class="form-group col-md-4 offset-4">
        <label for="remote_ip">IP Remote</label>
        <input type="text" class="form-control" id="remote_ip" name="remote_ip" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="lokal_ip">IP Lokal</label>
        <input type="text" class="form-control" id="lokal_ip" name="lokal_ip" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="username_ip">Username</label>
        <input type="text" class="form-control" id="username_ip" name="username_ip" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="password_ip">Password</label>
        <input type="text" class="form-control" id="password_ip" name="password_ip" required>
    </div>

    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="index.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>