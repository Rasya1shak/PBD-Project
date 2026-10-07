<?php

include "koneksi.php";

if (isset($_POST['simpan'])) {

    $idbarang = $_POST['idbarang'];
    $jenis = $_POST['jenis'];
    $nama = $_POST['nama'];
    $idsatuan = $_POST['idsatuan'];
    $status = $_POST['status'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO barang
              (idbarang, jenis, nama, idsatuan, status, harga)
              VALUES
              ('$idbarang', '$jenis', '$nama', '$idsatuan', '$status', '$harga')";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {

        header("Location: index.php");
        exit;

    } else {

        echo "Data gagal ditambahkan: " . mysqli_error($koneksi);

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Tambah Barang</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Tambah Barang</h1>

    <form method="POST">

        <div class="form-group">

            <label>ID Barang</label>

            <input
                type="number"
                name="idbarang"
                maxlength="11"
                placeholder=""
                required
            >

        </div>


        <div class="form-group">

            <label>Jenis Barang</label>

            <input
                type="text"
                name="jenis"
                maxlength="1"
                placeholder=""
                required
            >

        </div>


        <div class="form-group">

            <label>Nama Barang</label>

            <input
                type="text"
                name="nama"
                maxlength="45"
                placeholder=""
                required
            >

        </div>


        <div class="form-group">

            <label>ID Satuan</label>

            <input
                type="number"
                name="idsatuan"
                placeholder=""
                required
            >

        </div>


        <div class="form-group">

            <label>Status</label>

            <select name="status">

                <option value="1">
                    Aktif
                </option>

                <option value="0">
                    Tidak Aktif
                </option>

            </select>

        </div>


        <div class="form-group">

            <label>Harga</label>

            <input
                type="number"
                name="harga"
                placeholder=""
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
                href="index.php"
                class="btn-cancel"
            >
                Batal
            </a>

        </div>

    </form>

</div>

</body>

</html>