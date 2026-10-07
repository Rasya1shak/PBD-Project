<?php

include "koneksi.php";

$idbarang = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "UPDATE barang
     SET status_barang = 0
     WHERE idbarang = '$idbarang'"
);

if ($query) {

    header("Location: index.php");
    exit;

} else {

    echo "Barang gagal dinonaktifkan: " . mysqli_error($koneksi);

}

?>