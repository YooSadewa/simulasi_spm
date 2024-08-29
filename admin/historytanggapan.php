<?php
session_start();
include '../config.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE tanggapan.id_pengaduan = '$id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylecetak.css">
</head>
<body>
    <div class="form-container" style="padding-right: 40px;">
        <h1>Hasil Pengaduan Masyarakat dan Tanggapannya</h1>
        <form action="#" method="post">
            <input type="hidden" name="id_pengaduan" value="<?=$row['id_pengaduan']?>">
            <input type="text" name="nama" disabled value="Nama Masyarakat yang melapor: <?=$row['nama']?>" id="nama" style="color: #000; text-transform: capitalize;">
            <input type="text" name="nik" disabled value="NIK Masyarakat yang Melapor: <?=$row['nik']?>" style="color: #000; text-transform: capitalize;">
            <input type="text" name="telp" disabled value="No. Telp Masyarakat yang Melapor: <?=$row['telp']?>" style="color: #000; text-transform: capitalize;">
            <input type="text" name="tgl_pengaduan" disabled value="Tanggal Melapor: <?=$row['tgl_pengaduan']?>" style="color: #000; text-transform: capitalize;">
            <input type="text" name="isi_laporan" disabled value="Isi Laporan: <?=$row['isi_laporan']?>" style="color: #000; text-transform: capitalize;">
            <h3 style="margin-left: 10px; font-weight:400;">Foto Laporan</h3>
            <img src="../masyarakat/foto_laporan/<?=$row['foto']?>" alt="">
            <input type="text" name="nama_petugas" disabled value="Nama Petugas Yang Menanggapi: <?=$row['nama_petugas']?>" id="nama" style="color: #000; text-transform: capitalize;">
            <input type="text" name="tgl_tanggapan" disabled id="tanggal" value="Tanggal Ditanggapi: <?= $row['tgl_tanggapan'] ?>" readonly required style="color: #000;">
            <input type="text" value="Tanggapan: <?= $row['tanggapan']?>" disabled style="color: #000;">
            <input type="hidden" name="id_petugas" value="<?=$_SESSION['id_petugas']?>">
            <a href="index.php">Kembali ke Halaman Awal</a>
            <button type="button" onclick="window.print()">Cetak Laporan</button>
        </form>
    </div>
</body>
</html>
