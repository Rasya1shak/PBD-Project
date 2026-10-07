<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "UPDATE satuan
     SET status = 0
     WHERE idsatuan = '$id'"
);

if ($query) {

    header("Location: satuan.php");
    exit;

} else {

    echo "Satuan gagal dinonaktifkan: "
        . mysqli_error($koneksi);

}

?>