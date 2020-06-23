<?php
include "../header.php";
require "functions.php";
$jenis = query("SELECT * FROM jenis_opd");

?>



<div class="d-flex" id="wrapper">



    <!-- Page Content -->
    <div id="page-content-wrapper">
        <center>
            <h1>Jenis OPD</h1>
        </center>


        <div class="col-md-10 offset-1">
            <a style="margin-bottom:20px" class="btn btn-sm btn-warning" href="../opd/index.php" role="button">Daftar OPD</a>
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                        <th scope="col">Nama Jenis OPD</th>

                        <th scope="col" style="width: 17%">
                            <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jenis as $row) : ?>
                        <tr>
                            <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                            <td style="text-align: center;"><?= $row["nama_jenis_opd"]; ?></td>
                            <td style="text-align: center">
                                <a class="btn btn-sm btn-info" href="ubah.php?id_jenis_opd=<?= $row["id_jenis_opd"]; ?>" role="button">ubah</a>
                                <a class="btn btn-sm btn-danger" href="hapus.php?id_jenis_opd=<?= $row["id_jenis_opd"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>



        </div>
    </div>

</div>
<?php
include "../footer.php";
?>