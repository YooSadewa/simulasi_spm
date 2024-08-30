<?php
session_start();
include '../config.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylecetak.css">
    <style>
        
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Hasil Pengaduan Masyarakat</h1>
        <form action="#" method="post">
            <input type="hidden" name="id_pengaduan" value="<?=$row['id_pengaduan']?>">
            <input type="text" name="nama" disabled value="Nama Masyarakat yang Melapor: <?=$row['nama']?>" id="nama" style="color: #000; text-transform:capitalize;">
            <input type="text" name="nik" disabled value="NIK Masyarakat yang Melapor: <?=$row['nik']?>" id="nama" style="color: #000; text-transform:capitalize;">
            <input type="text" name="telp" disabled value="N0. Telp Masyarakat yang Melapor: <?=$row['telp']?>" id="nama" style="color: #000; text-transform:capitalize;">
            <input type="text" name="tgl_pengaduan" disabled id="tanggal" value="Tanggal Melapor: <?= $row['tgl_pengaduan'] ?>" readonly required style="color: #000;">
            <input type="text" value="Isi Laporan: <?= $row['isi_laporan']?>" disabled style="color: #000;">
            <h3 style="margin-left: 10px; font-weight:400;">Foto Laporan</h3>
            <img src="../masyarakat/foto_laporan/<?=$row['foto']?>" alt="" style="width:fit-content; height:100px;"><br>
            <a href="index.php">Kembali ke Halaman Awal</a>
            <button type="button" onclick="window.print()">Cetak Pengaduan</button>
        </form>
    </div>
</body>
</html>
