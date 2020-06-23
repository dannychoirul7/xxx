<?php
include "../header.php";
require "functions.php";
$perangkat = query("SELECT * FROM perangkat");


?>



<div class="d-flex" id="wrapper">

    <?php
    include "../side.php";
    ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <center>
            <h1>Data Perangkat</h1>
        </center>


        <div class="col-md-10 offset-1">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                        <th scope="col">Nama Perangkat</th>
                        <th scope="col">Jenis Perangkat</th>
                        <th scope="col">Gambar Perangkat</th>
                        <th scope="col" style="width: 15%">
                            <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($perangkat as $row) : ?>
                        <tr>
                            <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                            <td style="text-align: center;"><?= $row["nama_perangkat"]; ?></td>
                            <td style="text-align: center;"><?= $row["jenis_perangkat"]; ?></td>
                            <td style="text-align: center;"><img src="../img/<?= $row["gambar_perangkat"]; ?>" width="50"></td>
                            <td style="text-align: center">
                                <a class="btn btn-sm btn-info" href="ubah.php?id_perangkat=<?= $row["id_perangkat"]; ?>" role="button">ubah</a>
                                <a class="btn btn-sm btn-danger" href="hapus.php?id_perangkat=<?= $row["id_perangkat"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>

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