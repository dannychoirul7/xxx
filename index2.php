<?php
include '../koneksi.php';

// ambil data dari database berdasarkan id_kota
$id_master_vlan = $_GET['id_master_vlan'];
$query = "SELECT * FROM master_vlan WHERE id_master_vlan = '$id_master_vlan'";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);

?>
<!doctype html>
<html>

<head>
    <title>Select2 - harviacode.com</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/select2.min.css" />
</head>

<body>
    <div style="width: 300px; padding: 15px">
        <form action="aksi_ubah.php" method="post">
            <div class="form-group">
                <label>Kota Favorit</label>
                <select width="15%" id="kota2" name="kota2[]" class="form-control" multiple="multiple">
                    <option value=""></option>
                    <?php
                    // ambil data dari database
                    $id_master_vlan = $_GET['id_master_vlan'];
                    $query = "SELECT * FROM master_vlan WHERE id_master_vlan = '$id_master_vlan'";
                    $hasil = mysqli_query($conn, $query);
                    $data = mysqli_fetch_array($hasil);
                    $query2 = "SELECT * FROM vlan ORDER BY id_vlan";
                    $hasil2 = mysqli_query($conn, $query2);
                    while ($row2 = mysqli_fetch_array($hasil2)) {
                    ?>
                        <option value="<?php echo $row2['vlan'] ?>" <?php echo in_array($row2['id_vlan'], unserialize($data['vlan_satu'])) ? 'selected="selected"' : '' ?>>
                            <?php echo $row2['nama_vlan'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="id_kota" value="<?php echo $data['id_kota'] ?>" class="btn btn-primary">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="jquery-2.1.4.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#kota").select2({
                placeholder: "Please Select"
            });

            $("#kota2").select2({
                placeholder: "Please Select"
            });
        });
    </script>
</body>

</html>