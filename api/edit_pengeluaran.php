<?php
if (!isset($_COOKIE['login']) || $_COOKIE['login'] !== 'true') {
    header("Location: index.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pengeluaran
        WHERE id='$id'"
    )
);

if (isset($_POST['update'])) {
    
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "UPDATE pengeluaran SET
        tanggal='$tanggal',
        keterangan='$keterangan',
        jumlah='$jumlah'
        WHERE id='$id'"
    );

    header("Location: pengeluaran.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Pengeluaran</h2>

    <form method="POST">
        Tanggal<br>
        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required><br><br>

        Keterangan<br>
        <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>" required><br><br>

        Jumlah<br>
        <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>

        <button type="submit" name="update">
            Update
        </button>
    </form>
    <br>
    <a href="pengeluaran.php">Kembali</a>
</body>
</html>