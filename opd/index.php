<?php
include "../header.php";
require "functions.php";
$opd = query("SELECT * FROM opd JOIN jenis_opd ON jenis_opd_satu=id_jenis_opd");
?>



<div class="d-flex" id="wrapper">

    <?php
    include "../side.php";
    ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">



        <center>
            <h1>Organisasi Perangkat Daerah</h1>
        </center>


        <div class="col-md-10 offset-1">
            <a style="margin-bottom:20px" class="btn btn-sm btn-warning" href="../jenis/index.php" role="button">Jenis OPD</a>


            <table class="table table-striped" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                        <th scope="col">Nama OPD</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Koordinat</th>
                        <th scope="col">Jenis OPD</th>
                        <?php $level = $_SESSION["level"] == "nol" || $_SESSION["level"] == "satu";
                        if ($level) { ?>
                            <th scope="col" style="width: 15%">

                                <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>

                            </th>
                        <?php    }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($opd as $row) : ?>
                        <tr>
                            <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                            <td><?= $row["nama_opd"]; ?></td>
                            <td><?= $row["alamat_opd"]; ?></td>
                            <td>
                                <a href="<?= $row["koordinat_opd"]; ?>" class="btn btn-link"><?= $row["koordinat_opd"]; ?> </a>
                            </td>
                            <td><?= $row["nama_jenis_opd"]; ?></td>
                            <?php $level = $_SESSION["level"] == "nol"  || $_SESSION["level"] == "satu";
                            if ($level) { ?>
                                <td style="text-align: center">
                                    <a class="btn btn-sm btn-info" href="ubah.php?id_opd=<?= $row["id_opd"]; ?>" role="button">ubah</a>
                                    <a class="btn btn-sm btn-danger" href="hapus.php?id_opd=<?= $row["id_opd"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>

                                </td>
                            <?php    }
                            ?>
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