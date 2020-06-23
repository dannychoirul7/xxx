<?php
include "../header.php";
require "functions.php";
$conn = mysqli_connect("localhost", "root", "", "data");

// ambil datadi URL
$id_master_vlan = $_GET["id_master_vlan"];

// query data mahasiswa berdasarkan id
$master_vlan = query("SELECT * FROM master_vlan WHERE id_master_vlan = $id_master_vlan ")[0];

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




<h1 style="text-align: center;">Ubah Master Vlan</h1>

<form action="" method="post">
    <input type="hidden" id="id_master_vlan" name="id_master_vlan" value="<?= $master_vlan["id_master_vlan"]; ?>">
    <div class="form-group col-md-4 offset-4">
        <label>Data OPD</label>
        <div class="input-group">
            <select id="opd_satu" name="opd_satu" class="form-control">
                <?php

                // agar nilai yang sama bisa muncul dan pilih 
                $querymaster_vlan = mysqli_query($conn, "SELECT * FROM master_vlan JOIN opd ON opd_satu=id_opd WHERE id_master_vlan='$id_master_vlan'");
                if ($querymaster_vlan == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($master_vlan_opd = mysqli_fetch_assoc($querymaster_vlan)) {
                    echo "<option value='$master_vlan_opd[opd_satu]'>$master_vlan_opd[nama_opd]</option>";
                }

                // agar nilai yang tidak sama bisa muncul dan pilih 
                $querymstr_vlan = mysqli_query($conn, "SELECT * FROM opd");
                if ($querymstr_vlan == false) {
                    die("Terdapat Kesalahan : " . mysqli_error($conn));
                }
                while ($mstr_vlan = mysqli_fetch_assoc($querymstr_vlan)) {
                    if ($mstr_vlan["id_opd"] != $master_vlan["opd_satu"]) {
                        echo "<option value='$mstr_vlan[id_opd]'>$mstr_vlan[nama_opd]</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>


    <div class="form-group col-md-4 offset-4">
        <label>Data Vlan</label>
        <div class="input-group">
            <select id="vlan_satu" name="vlan_satu[]" multiple="multiple" class="form-control">
                <option value=""></option>
                <?php
                // ambil data dari database

                $query3 = "SELECT * FROM master_vlan WHERE id_master_vlan = '$id_master_vlan'";
                $hasil = mysqli_query($conn, $query3);
                $data = mysqli_fetch_array($hasil);
                $query2 = "SELECT * FROM vlan ORDER BY id_vlan";
                $hasil2 = mysqli_query($conn, $query2);
                while ($row2 = mysqli_fetch_array($hasil2)) {
                ?>
                    <option value="<?php echo $row2['nama_vlan'] ?>" <?php echo in_array($row2['nama_vlan'], unserialize($data['vlan_satu'])) ? 'selected="selected"' : '' ?>>
                        <?php echo $row2['nama_vlan'] ?></option>
                <?php
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

        });

    });
</script>