<?php

include "koneksi.php";

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM satuan
     WHERE status_satuan = 1
     ORDER BY idsatuan ASC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Data Satuan</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Data Satuan</h1>

    <a href="tambah_satuan.php" class="btn">
        + Tambah Satuan
    </a>

    <br><br>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nama Satuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            <?php while ($satuan = mysqli_fetch_assoc($query)) { ?>

                <tr>

                    <td>
                        <?= $satuan['idsatuan']; ?>
                    </td>

                    <td>
                        <?= $satuan['nama_satuan']; ?>
                    </td>

                    <td>
                        Aktif
                    </td>

                    <td>

                        <a
                            href="edit_satuan.php?id=<?= $satuan['idsatuan']; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="hapus_satuan.php?id=<?= $satuan['idsatuan']; ?>"
                            class="btn-delete"
                            onclick="return confirm('Nonaktifkan satuan ini?');"
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