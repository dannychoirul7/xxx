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
<h1 style="text-align: center;">Tambah Data Vlan</h1>

<form action="" method="post">

    <div class="form-group col-md-4 offset-4">
        <label for="nama_vlan">Nama vlan</label>
        <input type="text" class="form-control" id="nama_vlan" name="nama_vlan" required>
    </div>
    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="lihat.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>