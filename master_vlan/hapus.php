<?php

require "functions.php";

$id_master_vlan = $_GET["id_master_vlan"];

if (hapus($id_master_vlan) > 0) {
    echo "<script>
    alert('data sukses di hapus');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal di hapus');
    document.location.href = 'index.php';
    </script>";
}
