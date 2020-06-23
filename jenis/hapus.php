<?php

require "functions.php";

$id_jenis_opd = $_GET["id_jenis_opd"];

if (hapus($id_jenis_opd) > 0) {
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
