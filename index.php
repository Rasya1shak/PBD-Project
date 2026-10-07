<?php

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM barang");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Barang - Toko Bangunan</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Data Barang</h1>

        <a href="tambah_barang.php" class="btn">
            + Tambah Barang
        </a>
    </div>

    <table>

        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>ID Satuan</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($barang = mysqli_fetch_assoc($query)) { ?>

            <tr>

                <td>
                    <?= $barang['idbarang']; ?>
                </td>

                <td>
                    <?= $barang['jenis']; ?>
                </td>

                <td>
                    <?= $barang['nama']; ?>
                </td>

                <td>
                    <?= $barang['idsatuan']; ?>
                </td>

                <td>
                    <?= $barang['status_barang'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                </td>

                <td>
                    Rp <?= number_format($barang['harga'], 0, ',', '.'); ?>
                </td>

                <td>

                    <a 
                    href="edit_barang.php?id=<?= $barang['idbarang']; ?>" class="btn-edit">
                        Edit
                    </a>

                    <a 
                    href="hapus_barang.php?id=<?= $barang['idbarang']; ?>" 
                    class="btn-delete"
                     onclick="return confirm('Apakah kamu yakin ingin menonaktifkan barang ini?');"
                     >
                        Hapus
                    </a>

                </td>

            </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

</body>

</html>