<?php
include "../header.php";
require "functions.php";
$master_vlan = query("SELECT * FROM master_vlan 
JOIN opd ON opd_satu=id_opd 
JOIN jenis_opd ON jenis_opd_satu=id_jenis_opd 
-- JOIN vlan ON vlan_satu=id_vlan
");

function serialize_ke_string($serial)
{
    $hasil = unserialize($serial);
    return implode(', ', $hasil);
}
$vlan_satu = "SELECT * FROM master_vlan ORDER BY id_master_vlan";



?>



<div class="d-flex" id="wrapper">

    <?php
    include "../side.php";
    ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">



        <center>
            <h1>Master Vlan</h1>
        </center>




        <div class="d-flex" id="wrapper">




            <div class="col-md-10 offset-1">
                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr style="text-align: center">
                            <th width="5%" style="text-align: center;" scope="col">Nomor</th>
                            <th scope="col">Nama OPD</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis OPD</th>
                            <th scope="col">Daftar Vlan</th>

                            <th scope="col" style="width: 15%">
                                <a class="btn btn-sm btn-primary" href="tambah.php" role="button">tambah data</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>


                        <?php
                        $hasil = mysqli_query($conn, $vlan_satu);
                        $row = mysqli_fetch_array($hasil);
                        foreach ($master_vlan as $row) :
                        ?>
                            <tr>
                                <td width="5%" style="text-align: center;" scope="row"><?= $i; ?></td>
                                <td style="text-align: center;"><?= $row["nama_opd"]; ?></td>
                                <td style="text-align: center;"><?= $row["alamat_opd"]; ?></td>
                                <td style="text-align: center;"><?= $row["nama_jenis_opd"]; ?></td>
                                <td><?php echo serialize_ke_string($row['vlan_satu']) ?></td>
                                <td style="text-align: center">
                                    <a class="btn btn-sm btn-info" href="ubah.php?id_master_vlan=<?= $row["id_master_vlan"]; ?>" role="button">ubah</a>
                                    <a class="btn btn-sm btn-danger" href="hapus.php?id_master_vlan=<?= $row["id_master_vlan"]; ?>" onclick="return confirm('yakin?');" role="button">hapus</a>
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