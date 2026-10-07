<?php

include "koneksi.php";

/* Mengambil ID barang dari URL */
$idbarang = $_GET['id'];

/* Mengambil data barang berdasarkan ID */
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM barang WHERE idbarang = '$idbarang'"
);

$barang = mysqli_fetch_assoc($query);


/* Jika tombol Simpan Perubahan ditekan */
if (isset($_POST['update'])) {

    $jenis = $_POST['jenis'];
    $nama = $_POST['nama'];
    $idsatuan = $_POST['idsatuan'];
    $status_barang = $_POST['status'];
    $harga = $_POST['harga'];

    $query_update = mysqli_query(
        $koneksi,
        "UPDATE barang SET
            jenis = '$jenis',
            nama = '$nama',
            idsatuan = '$idsatuan',
            status_barang = '$status_barang',
            harga = '$harga'
        WHERE idbarang = '$idbarang'"
    );

    if ($query_update) {

        header("Location: index.php");
        exit;

    } else {

        echo "Data gagal diperbarui: " . mysqli_error($koneksi);

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Edit Barang</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Edit Barang</h1>

    <form method="POST">

        <!-- ID Barang -->

        <div class="form-group">

            <label>ID Barang</label>

            <input
                type="text"
                value="<?= $barang['idbarang']; ?>"
                disabled
            >

        </div>


        <!-- Jenis -->

        <div class="form-group">

            <label>Jenis Barang</label>

            <select name="jenis" required>

                <option value="">-- Pilih Jenis --</option>

                <option value="S"
                    <?= $barang['jenis'] == 'S' ? 'selected' : ''; ?>>
                    Semen
                </option>

                <option value="B"
                    <?= $barang['jenis'] == 'B' ? 'selected' : ''; ?>>
                    Batako
                </option>

                <option value="C"
                    <?= $barang['jenis'] == 'C' ? 'selected' : ''; ?>>
                    Cat (atau barang yang berbentuk cair) & Bahan Curah (Seperti pasir, kerikil, dll)
                </option>

                <option value="K"
                    <?= $barang['jenis'] == 'K' ? 'selected' : ''; ?>>
                    Keramik
                </option>

                <option value="P"
                    <?= $barang['jenis'] == 'P' ? 'selected' : ''; ?>>
                    Pipa
                </option>

                <option value="L"
                    <?= $barang['jenis'] == 'L' ? 'selected' : ''; ?>>
                    Lembaran(kayu, triplek, dll) & Logam
                </option>

                <option value="A"
                    <?= $barang['jenis'] == 'A' ? 'selected' : ''; ?>>
                    Alat Pertukangan & Alat Pelistrikan
                </option>

            </select>

        </div>


        <!-- Nama -->

        <div class="form-group">

            <label>Nama Barang</label>

            <input
                type="text"
                name="nama"
                value="<?= $barang['nama']; ?>"
                required
            >

        </div>


        <!-- Satuan -->

       <div class="form-group">

    <label>Satuan</label>

    <select name="idsatuan" required>

        <option value="">-- Pilih Satuan --</option>

        <?php

        $satuan = mysqli_query(
            $koneksi,
            "SELECT * FROM satuan
             WHERE status_satuan = 1
             ORDER BY nama_satuan ASC"
        );

        while ($s = mysqli_fetch_assoc($satuan)) {

        ?>

            <option
                value="<?= $s['idsatuan']; ?>"
                <?= $barang['idsatuan'] == $s['idsatuan'] ? 'selected' : ''; ?>
            >
                <?= $s['nama_satuan']; ?>
            </option>

        <?php } ?>

    </select>

</div>


        <!-- Status -->

        <div class="form-group">

            <label>Status</label>

            <select name="status" required>

                <option
                    value="1"
                    <?= $barang['status_barang'] == 1 ? 'selected' : ''; ?>
                >
                    Aktif
                </option>

                <option
                    value="0"
                    <?= $barang['status_barang'] == 0 ? 'selected' : ''; ?>
                >
                    Tidak Aktif
                </option>

            </select>

        </div>


        <!-- Harga -->

        <div class="form-group">

            <label>Harga</label>

            <input
                type="number"
                name="harga"
                value="<?= $barang['harga']; ?>"
                required
            >

        </div>


        <!-- Tombol -->

        <div class="form-actions">

            <button
                type="submit"
                name="update"
                class="btn"
            >
                Simpan Perubahan
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