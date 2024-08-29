<?php
session_start();
include '../config.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_pengaduan = '$id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styletanggapan.css">
    <style>
        
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Hasil Tanggapan</h1>
        <form action="#" method="post">
            <input type="hidden" name="id_pengaduan" value="<?=$row['id_pengaduan']?>">
            <input type="text" name="nama_petugas" disabled value="Nama Petugas Yang Menanggapi: <?=$row['nama_petugas']?>" id="nama" style="color: #000;">
            <label for="tanggal">
                <input type="text" name="tgl_tanggapan" disabled id="tanggal" value="Tanggal Ditanggapi: <?= $row['tgl_tanggapan'] ?>" readonly required style="color: #000;">
            </label>
            <input type="text" value="Tanggapan: <?= $row['tanggapan']?>" disabled style="color: #000;">
            <input type="hidden" name="id_petugas" value="<?=$_SESSION['id_petugas']?>">
            <a href="index.php">Kembali ke Halaman Awal</a>
        </form>
    </div>
</body>
</html>
