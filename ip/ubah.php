<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_ip = $_GET["id_ip"];

// query data mahasiswa berdasarkan id
$ip = query("SELECT * FROM ip WHERE id_ip = $id_ip ")[0];

// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    var_dump($_POST);



    // data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data sukses di ubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal di ubah');
        document.location.href = 'index.php';
        </script>";
    }
}
?>




<h1 style="text-align: center;">Ubah Data IP</h1>

<form action="" method="post">
    <input type="hidden" id="id_ip" name="id_ip" value="<?= $ip["id_ip"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label for="remote_ip">IP Remote</label>
        <input type="text" class="form-control" id="remote_ip" name="remote_ip" value="<?= $ip["remote_ip"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="lokal_ip">IP Lokal</label>
        <input type="text" class="form-control" id="lokal_ip" name="lokal_ip" value="<?= $ip["lokal_ip"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="username_ip">Username</label>
        <input type="text" class="form-control" id="username_ip" name="username_ip" value="<?= $ip["username_ip"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="password_ip">Password</label>
        <input type="text" class="form-control" id="password_ip" name="password_ip" value="<?= $ip["password_ip"]; ?>" required>
    </div>
    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="index.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>