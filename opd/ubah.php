<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_opd = $_GET["id_opd"];

// query data mahasiswa berdasarkan id
$opd = query("SELECT * FROM opd WHERE id_opd = $id_opd ")[0];

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




<h1 style="text-align: center;">Ubah Data OPD</h1>

<form action="" method="post">
    <input type="hidden" id="id_opd" name="id_opd" value="<?= $opd["id_opd"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label for="nama_opd">Nama OPD</label>
        <input type="text" class="form-control" id="nama_opd" name="nama_opd" value="<?= $opd["nama_opd"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="alamat_opd">Alamat OPD</label>
        <input type="text" class="form-control" id="alamat_opd" name="alamat_opd" value="<?= $opd["alamat_opd"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label for="koordinat_opd">Koordinat OPD</label>
        <input type="text" class="form-control" id="koordinat_opd" name="koordinat_opd" value="<?= $opd["koordinat_opd"]; ?>" required>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label>Pilih Jenis OPD</label>
        <div class="input-group">
            <select id="jenis_opd_satu" name="jenis_opd_satu" class="form-control">
                <?php

                // agar nilai yang sama bisa muncul dan pilih 
                $queryjenis_opd = mysqli_query($conn, "SELECT jenis_opd_satu,id_opd,nama_jenis_opd FROM opd JOIN jenis_opd ON jenis_opd_satu=id_jenis_opd WHERE id_opd='$id_opd'");
                if ($queryjenis_opd == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($jenis_opd = mysqli_fetch_assoc($queryjenis_opd)) {
                    echo "<option value='$jenis_opd[jenis_opd_satu]'>$jenis_opd[nama_jenis_opd]</option>";
                }

                // agar nilai yang tidak sama bisa muncul dan pilih 
                $queryjns_opd = mysqli_query($conn, "SELECT * FROM jenis_opd");
                if ($queryjns_opd == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($jns_opd = mysqli_fetch_assoc($queryjns_opd)) {
                    if ($jns_opd["id_jenis_opd"] != $opd["jenis_opd_satu"]) {
                        echo "<option value='$jns_opd[id_jenis_opd]'>$jns_opd[nama_jenis_opd]</option>";
                    }
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