<?php
if (!isset($_COOKIE['login']) || $_COOKIE['login'] !== 'true') {
    header("Location: index.php");
    exit;
}

include "koneksi.php";

if (isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "INSERT INTO pemasukan
        (tanggal,keterangan,jumlah)
        VALUES
        ('$tanggal','$keterangan','$jumlah')"
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pemasukan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h2>Tambah Data Pemasukan</h2>

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
    <a href="pemasukan.php">Kembali</a>

</body>
</html>