<?php
include "../koneksi.php";

function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $nama_vlan = htmlspecialchars($data["nama_vlan"]);


    // query insert data
    $query = "INSERT INTO vlan
    VALUES ('','$nama_vlan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_vlan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM vlan WHERE id_vlan = $id_vlan");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_vlan = $data["id_vlan"];
    $nama_vlan = htmlspecialchars($data["nama_vlan"]);


    // query update data
    $query = "UPDATE vlan SET
            nama_vlan = '$nama_vlan'
            WHERE id_vlan = $id_vlan    
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
