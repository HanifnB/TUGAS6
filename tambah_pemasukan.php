<?php
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
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form method="POST">
    
        Tanggal<br>
        <input type="date" name="tanggal"><br><br>
    
        Keterangan<br>
        <input type="text" name="keterangan"><br><br>
    
        Jumlah<br>
        <input type="number" name="jumlah"><br><br>
    
        <button name="simpan">
            Simpan
        </button>
    
    </form>
    <br>
    <a href="pemasukan.php">Kembali</a>

</body>
</html>