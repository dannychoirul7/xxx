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


<h1 style="text-align: center;">Tambah Data OPD</h1>

<form action="" method="post">

    <div class="form-group col-md-4 offset-4">
        <label for="nama_opd">Nama OPD</label>
        <input type="text" class="form-control" id="nama_opd" name="nama_opd" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="alamat_opd">Alamat OPD</label>
        <input type="text" class="form-control" id="alamat_opd" name="alamat_opd" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="koordinat_opd">Koordinat</label>
        <input type="text" class="form-control" id="koordinat_opd" name="koordinat_opd" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label>Pilih Jenis OPD</label>
        <div class="input-group">
            <select name="jenis_opd_satu" id="jenis_opd_satu" class="form-control" required>
                <option value=""></option>
                <?php

                $queryjenis_opd = mysqli_query($conn, "SELECT * FROM jenis_opd");
                if ($queryjenis_opd == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($jenis_opd = mysqli_fetch_assoc($queryjenis_opd)) {
                    echo "<option value='$jenis_opd[id_jenis_opd]'>$jenis_opd[nama_jenis_opd]</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="offset-4">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="index.php" role="button">Batal</a>
    </div>

</form>

<?php
include "../footer.php";
?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#jenis_opd_satu").select2({
            theme: "classic",
            allowClear: true,
            placeholder: "Silahkan Pilih"

        });

    });
</script>