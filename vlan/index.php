<?php
include "../header.php";
require "functions.php";
$vlan = query("SELECT * FROM vlan");



?>



<div class="d-flex" id="wrapper">

    <?php
    include "../side.php";
    ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <center>
            <h1>Data Vlan</h1>
        </center>



        <div class="col-md-10 offset-1">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                        <th scope="col">Nama vlan</th>

                        <th scope="col" style="width: 15%">
                            <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($vlan as $row) : ?>
                        <tr>
                            <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                            <td style="text-align: center;"><?= $row["nama_vlan"]; ?></td>
                            <td style="text-align: center">
                                <a class="btn btn-sm btn-info" href="ubah.php?id_vlan=<?= $row["id_vlan"]; ?>" role="button">ubah</a>
                                <a class="btn btn-sm btn-danger" href="hapus.php?id_vlan=<?= $row["id_vlan"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<?php
include "../footer.php";
?>