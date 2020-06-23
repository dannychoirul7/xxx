<?php
include "../koneksi.php";


function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $nama_jenis_opd = htmlspecialchars($data["nama_jenis_opd"]);


    // query insert data
    $query = "INSERT INTO jenis_opd
    VALUES ('','$nama_jenis_opd')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_jenis_opd)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jenis_opd WHERE id_jenis_opd = $id_jenis_opd");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_jenis_opd = $data["id_jenis_opd"];
    $nama_jenis_opd = htmlspecialchars($data["nama_jenis_opd"]);


    // query update data
    $query = "UPDATE jenis_opd SET
            nama_jenis_opd = '$nama_jenis_opd'
            WHERE id_jenis_opd = $id_jenis_opd    
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
