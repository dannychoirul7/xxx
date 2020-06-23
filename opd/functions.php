<?php

include "../koneksi.php";
function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $nama_opd = htmlspecialchars($data["nama_opd"]);
    $alamat_opd = htmlspecialchars($data["alamat_opd"]);
    $koordinat_opd = htmlspecialchars($data["koordinat_opd"]);
    $jenis_opd_satu = htmlspecialchars($data["jenis_opd_satu"]);

    // query insert data
    $query = "INSERT INTO opd
    VALUES ('','$nama_opd','$alamat_opd','$koordinat_opd','$jenis_opd_satu')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id_opd)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM opd WHERE id_opd = $id_opd");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_opd = $data["id_opd"];
    $nama_opd = htmlspecialchars($data["nama_opd"]);
    $alamat_opd = htmlspecialchars($data["alamat_opd"]);
    $koordinat_opd = htmlspecialchars($data["koordinat_opd"]);
    $jenis_opd_satu = htmlspecialchars($data["jenis_opd_satu"]);

    // query update data
    $query = "UPDATE opd SET
            nama_opd= '$nama_opd',
            alamat_opd ='$alamat_opd',
            jenis_opd_satu ='$jenis_opd_satu',
            koordinat_opd ='$koordinat_opd'
            WHERE id_opd = $id_opd       
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
