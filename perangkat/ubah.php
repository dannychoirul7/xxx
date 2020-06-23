<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_perangkat = $_GET["id_perangkat"];

// query data mahasiswa berdasarkan id
$perangkat = query("SELECT * FROM perangkat WHERE id_perangkat = $id_perangkat ")[0];

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




<h1 style="text-align: center;">Ubah Data Perangkat</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" id="id_perangkat" name="id_perangkat" value="<?= $perangkat["id_perangkat"]; ?>">
    <input type="hidden" name="gambar_perangkat_Lama" value="<?= $perangkat["gambar_perangkat"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label for="nama_perangkat">Nama Perangkat</label>
        <input type="text" class="form-control" id="nama_perangkat" name="nama_perangkat" value="<?= $perangkat["nama_perangkat"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="jenis_perangkat">Jenis Perangkat</label>
        <input type="text" class="form-control" id="jenis_perangkat" name="jenis_perangkat" value="<?= $perangkat["jenis_perangkat"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="gambar_perangkat">Jenis Perangkat</label>
        <input class="form-control" id="gambar_perangkat" name="gambar_perangkat" type="file">
        <img src="../img/<?= $perangkat["gambar_perangkat"]; ?>" width="100"><br>
    </div>
    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="index.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>