<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);

include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylelaporan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php
        include 'assets/nav.php';
    ?>
    <div class="form-container">
        <h1>Buat Laporan</h1>
        <form action="proses/proseslaporan.php" method="post"  enctype="multipart/form-data">
            <input type="text" name="nama" readonly value="<?= $_SESSION['nama']?>" id="nama">
            <input type="tel" name="nik" readonly value="<?= $_SESSION['nik']?>">
            <label for="tanggal">
                <input type="date" name="tgl_pengaduan" id="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly required>
            </label>
            <textarea name="laporan" id="" placeholder="Berikan Laporanmu"></textarea> 
            <label for="foto"><h2>Sertakan Foto?</h2>
                <input type="file" name="foto" id="foto">                
            </label>
            <div id="preview"></div>
            <input type="hidden" name="status" value="0">
            <input type="submit" value="Kirimkan Laporan" name="submit">
        </form>
    </div>
</body>
</html>