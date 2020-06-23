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


<h1 style="text-align: center;">Tambah Master Vlan</h1>

<form action="" method="post">

    <div class="form-group col-md-4 offset-4">
        <label>Pilih Data OPD</label>
        <div class="input-group">
            <select name="opd_satu" id="opd_satu" class="form-control" required>
                <option value=""></option>
                <?php

                $querymaster_vlan_opd = mysqli_query($conn, "SELECT * FROM opd");
                if ($querymaster_vlan_opd == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($master_vlan_opd = mysqli_fetch_assoc($querymaster_vlan_opd)) {
                    echo "<option value='$master_vlan_opd[id_opd]'>$master_vlan_opd[nama_opd]</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group col-md-4 offset-4">
        <label>Pilih Data Vlan</label>
        <div class="input-group">
            <select name="vlan_satu[]" id="vlan_satu" multiple="multiple" class="form-control" required>
                <option value=""></option>

                <?php

                $query_vlan_opd = mysqli_query($conn, "SELECT * FROM vlan");
                if ($query_vlan_opd == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($vlan_opd = mysqli_fetch_assoc($query_vlan_opd)) {
                    echo "<option value='$vlan_opd[nama_vlan]'>$vlan_opd[nama_vlan]</option>";
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
        $("#opd_satu").select2({
            theme: "classic",
            allowClear: true,
            placeholder: "Silahkan Pilih"
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#vlan_satu").select2({
            placeholder: "Silahkan Pilih"
        });

    });
</script>