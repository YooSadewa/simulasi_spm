<?php
    session_start();
    include '../config.php';
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id' ");
    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styletanggapan.css">
</head>
<body>
    <div class="form-container">
        <h1>Beri Tanggapan</h1>
        <form action="proses/prosestanggapan.php" method="post">
            <input type="hidden" name="id_pengaduan" value="<?=$row['id_pengaduan']?>">
            <input type="text" name="nama_petugas" readonly value="<?= $_SESSION['nama_petugas']?>" id="nama">
            <label for="tanggal">
                <input type="date" name="tgl_tanggapan" id="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly required>
            </label>
            <textarea name="tanggapan" id="" placeholder="Berikan Tanggapan"></textarea> 
            <input type="hidden" name="id_petugas" value="<?=$_SESSION['id_petugas']?>">
            <input type="submit" value="Kirim Tanggapan" name="submit">
        </form>
        <a href="index.php">Kembali ke Halaman Awal</a>
    </div>
</body>
</html>