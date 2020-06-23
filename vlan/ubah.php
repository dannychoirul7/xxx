<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_vlan = $_GET["id_vlan"];

// query data mahasiswa berdasarkan id
$vlan = query("SELECT * FROM vlan WHERE id_vlan = $id_vlan ")[0];

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




<h1 style="text-align: center;">Ubah Data Vlan</h1>

<form action="" method="post">
    <input type="hidden" id="id_vlan" name="id_vlan" value="<?= $vlan["id_vlan"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label for="nama_vlan">Nama OPD</label>
        <input type="text" class="form-control" id="nama_vlan" name="nama_vlan" value="<?= $vlan["nama_vlan"]; ?>" required>
    </div>

    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="lihat.php" role="button">Batal</a>
    </div>

</form>
<?php
include "../footer.php";
?>