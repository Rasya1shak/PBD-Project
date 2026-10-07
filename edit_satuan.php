<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM satuan WHERE idsatuan = '$id'"
);

$satuan = mysqli_fetch_assoc($query);

if (!$satuan) {
    die("Data satuan tidak ditemukan.");
}


if (isset($_POST['update'])) {

    $nama_satuan = $_POST['nama_satuan'];

    $query_update = mysqli_query(
        $koneksi,
        "UPDATE satuan SET
            nama_satuan = '$nama_satuan'
        WHERE idsatuan = '$id'"
    );

    if ($query_update) {

        header("Location: satuan.php");
        exit;

    } else {

        echo "Data gagal diperbarui: "
            . mysqli_error($koneksi);

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Edit Satuan</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Edit Satuan</h1>

    <form method="POST">

        <div class="form-group">

            <label>ID Satuan</label>

            <input
                type="text"
                value="<?= $satuan['idsatuan']; ?>"
                disabled
            >

        </div>


        <div class="form-group">

            <label>Nama Satuan</label>

            <input
                type="text"
                name="nama_satuan"
                value="<?= $satuan['nama_satuan']; ?>"
                required
            >

        </div>


        <div class="form-actions">

            <button
                type="submit"
                name="update"
                class="btn"
            >
                Simpan Perubahan
            </button>

            <a
                href="satuan.php"
                class="btn-cancel"
            >
                Batal
            </a>

        </div>

    </form>

</div>

</body>

</html>