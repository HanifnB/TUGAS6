<?php
$host = "mysql-keuangan-tugaskeuangancrud01.l.aivencloud.com";
$user = "avnadmin";
$pass = "AVNS_e9ZydT4EUJuCpvQOvaS"; 
$db   = "defaultdb"; 
$port = "11531"; 

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>