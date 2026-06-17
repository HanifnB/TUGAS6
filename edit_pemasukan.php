<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pemasukan
        WHERE id='$id'"
    )
);

if (isset($_POST['update'])) {

    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "UPDATE pemasukan SET
        tanggal='$tanggal',
        keterangan='$keterangan',
        jumlah='$jumlah'
        WHERE id='$id'"
    );

    header("Location: pemasukan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
    
        Tanggal<br>
        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>"><br><br>
    
        Keterangan<br>
        <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>"><br><br>
    
        Jumlah<br>
        <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>"><br><br>
    
        <button name="update">
            Update
        </button>
    
    </form>
    <br>
    <a href="pemasukan.php">Kembali</a>
</body>
</html>