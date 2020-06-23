<?php
include "../header.php";
require "functions.php";
$ip = query("SELECT * FROM ip");



?>



<div class="d-flex" id="wrapper">

    <?php
    include "../side.php";
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <center>
            <h1>Data IP</h1>
        </center>


        <div class="col-md-10 offset-1">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                        <th scope="col">IP Remote</th>
                        <th scope="col">IP Lokal</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Tanggal di buat</th>
                        <th scope="col">Tanggal di update</th>
                        <th scope="col" style="width: 15%">
                            <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ip as $row) : ?>
                        <tr>
                            <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                            <td><?= $row["remote_ip"]; ?></td>
                            <td><?= $row["lokal_ip"]; ?></td>
                            <td><?= $row["username_ip"]; ?></td>
                            <td><?= $row["password_ip"]; ?></td>
                            <td><?= $row["tgl_masuk"]; ?></td>
                            <td><?= $row["tgl_ubah"]; ?></td>
                            <td style="text-align: center">
                                <a class="btn btn-sm btn-info" href="ubah.php?id_ip=<?= $row["id_ip"]; ?>" role="button">ubah</a>
                                <a class="btn btn-sm btn-danger" href="hapus.php?id_ip=<?= $row["id_ip"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>

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