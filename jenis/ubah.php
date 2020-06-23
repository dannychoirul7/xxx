<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_jenis_opd = $_GET["id_jenis_opd"];

// query data mahasiswa berdasarkan id
$jenis_opd = query("SELECT * FROM jenis_opd WHERE id_jenis_opd = $id_jenis_opd ")[0];

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




<h1 style="text-align: center;">Ubah Data Jenis OPD</h1>

<form action="" method="post">
    <input type="hidden" id="id_jenis_opd" name="id_jenis_opd" value="<?= $jenis_opd["id_jenis_opd"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label for="nama_jenis_opd">Nama OPD</label>
        <input type="text" class="form-control" id="nama_jenis_opd" name="nama_jenis_opd" value="<?= $jenis_opd["nama_jenis_opd"]; ?>" required>
    </div>

    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="index.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>