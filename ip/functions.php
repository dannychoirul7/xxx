<?php
include "../koneksi.php";

function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $remote_ip = htmlspecialchars($data["remote_ip"]);
    $lokal_ip = htmlspecialchars($data["lokal_ip"]);
    $username_ip = htmlspecialchars($data["username_ip"]);
    $password_ip = htmlspecialchars($data["password_ip"]);
    $tgl_masuk  = date('Y-m-d H:i:s');
    $tgl_ubah  = date('Y-m-d H:i:s');

    // query insert data
    $query = "INSERT INTO ip
    VALUES ('','$remote_ip','$lokal_ip','$username_ip','$password_ip','$tgl_masuk','$tgl_ubah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id_ip)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ip WHERE id_ip = $id_ip");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_ip = $data["id_ip"];
    $remote_ip = htmlspecialchars($data["remote_ip"]);
    $lokal_ip = htmlspecialchars($data["lokal_ip"]);
    $username_ip = htmlspecialchars($data["username_ip"]);
    $password_ip = htmlspecialchars($data["password_ip"]);
    $tgl_ubah  = date('Y-m-d H:i:s');



    // query update data
    $query = "UPDATE ip SET
            remote_ip = '$remote_ip',
            lokal_ip ='$lokal_ip',
            username_ip ='$username_ip',
            password_ip ='$password_ip',
            tgl_ubah ='$tgl_ubah'
            WHERE id_ip = $id_ip       
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
