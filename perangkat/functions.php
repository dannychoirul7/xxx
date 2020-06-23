<?php
include "../koneksi.php";


function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $nama_perangkat = htmlspecialchars($data["nama_perangkat"]);
    $jenis_perangkat = htmlspecialchars($data["jenis_perangkat"]);

    // upload gambar
    $gambar_perangkat = upload();
    if (!$gambar_perangkat) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO perangkat
    VALUES ('','$nama_perangkat','$jenis_perangkat','$gambar_perangkat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_perangkat)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM perangkat WHERE id_perangkat = $id_perangkat");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_perangkat = $data["id_perangkat"];
    $nama_perangkat = htmlspecialchars($data["nama_perangkat"]);
    $jenis_perangkat = htmlspecialchars($data["jenis_perangkat"]);
    $gambar_perangkat_Lama = htmlspecialchars($data["gambar_perangkat_Lama"]);

    if ($_FILES['gambar_perangkat']['error'] === 4) {
        $gambar_perangkat = $gambar_perangkat_Lama;
    } else {
        $gambar_perangkat = upload();

        // hapus gambar pada direktori
        $queryunlink =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM perangkat WHERE id_perangkat = $id_perangkat"));
        $filename = $queryunlink["gambar_perangkat"];
        unlink('../img/' . $filename);
    }


    // query update data
    $query = "UPDATE perangkat SET
            nama_perangkat = '$nama_perangkat',
            jenis_perangkat = '$jenis_perangkat',
            gambar_perangkat = '$gambar_perangkat'
            WHERE id_perangkat = $id_perangkat    
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $namaFile = $_FILES['gambar_perangkat']['name'];
    $ukuranFile = $_FILES['gambar_perangkat']['size'];
    $error = $_FILES['gambar_perangkat']['error'];
    $tmpName = $_FILES['gambar_perangkat']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script> alert('pilih gambar!!!!!');</script>";
        return false;
    }

    // cek apakah yang di upload gambar 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //strtolower=paksa huruf jadi kecil && end = array paling akhir
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('bukan gambar!!!!!');</script>";
        return false;
    }

    // cek ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('gambar kegedean!!!!!');</script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid(); // membuat string random
    // var_dump($namaFileBaru);
    // // die;
    $namaFileBaru .= '.'; // titik sama dengan itu untuk menempelkan nama uniqid diatas dengan titik
    $namaFileBaru .= $ekstensiGambar; // dan menempelkan titik diatas dengan ekstensigambar

    // lolos pengecekan gambar siap di upload
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}
