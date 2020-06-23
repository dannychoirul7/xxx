<?php

include "../koneksi.php";



function tambah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $opd_satu = htmlspecialchars($data["opd_satu"]);


    // multiple_select
    $vlan = array();
    foreach ($data['vlan_satu'] as $vlan_satu) {
        array_push($vlan, $vlan_satu);
    }
    $vlan_satu = serialize($vlan);



    // query insert data
    $query = "INSERT INTO master_vlan
    VALUES ('','$opd_satu','$vlan_satu')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id_master_vlan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM master_vlan WHERE id_master_vlan = $id_master_vlan");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data daritiap elemen dalam form
    $id_master_vlan = $data["id_master_vlan"];

    $opd_satu = htmlspecialchars($data["opd_satu"]);

    // multiple_select
    $vlan = array();
    foreach ($data['vlan_satu'] as $vlan_satu) {
        array_push($vlan, $vlan_satu);
    }
    $vlan_satu = serialize($vlan);


    // query update data
    $query = "UPDATE master_vlan SET
           
           opd_satu ='$opd_satu',
           vlan_satu ='$vlan_satu'
            WHERE id_master_vlan = $id_master_vlan      
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
