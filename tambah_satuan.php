<?php

include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama_satuan = $_POST['nama_satuan'];

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO satuan
        (nama_satuan, status_satuan)
        VALUES
        ('$nama_satuan', 1)"
    );

    if ($query) {

        header("Location: satuan.php");
        exit;

    } else {

        echo "Data gagal ditambahkan: "
            . mysqli_error($koneksi);

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Tambah Satuan</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Tambah Satuan</h1>

    <form method="POST">

        <div class="form-group">

            <label>Nama Satuan</label>

            <input
                type="text"
                name="nama_satuan"
                placeholder="Contoh: Sak, Kg, Pcs, Batang"
                required
            >

        </div>

        <div class="form-actions">

            <button
                type="submit"
                name="simpan"
                class="btn"
            >
                Simpan
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