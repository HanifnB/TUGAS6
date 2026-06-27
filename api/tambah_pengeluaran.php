<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "INSERT INTO pengeluaran
        (tanggal, keterangan, jumlah)
        VALUES
        ('$tanggal', '$keterangan', '$jumlah')"
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Pengeluaran</h2>

    <form method="POST">
        Tanggal<br>
        <input type="date" name="tanggal" required><br><br>

        Keterangan<br>
        <input type="text" name="keterangan" required><br><br>

        Jumlah<br>
        <input type="number" name="jumlah" required><br><br>

        <button type="submit" name="simpan">
            Simpan
        </button>
    </form>
    <br>
    <a href="pengeluaran.php">Kembali</a>
</body>
</html>