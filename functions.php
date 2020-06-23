<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "data");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function daftar($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]); //mysqli_real_escape_string = semua inputan masuk database secara aman
    $password2 = mysqli_real_escape_string($conn, $data["password2"]); //mysqli_real_escape_string = semua inputan masuk database secara aman
    $level = ($data["level"]);
    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('user sudah ada')</script>";
        return false;
    }

    // cek username minimal 5 karakter
    if (strlen($username) < 5) {
        echo "<script> alert('username minimal 5 huruf')</script>";
        return false;
    }

    // cek password minimal 5 karakter
    if (strlen($password) < 5) {
        echo "<script> alert('password minimal 5 huruf')</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> alert('password tidak sama')</script>";
        return false;
    }

    // enkripsi password
    // $password = md5($password);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$level')");
    return mysqli_affected_rows($conn);
}
