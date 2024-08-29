<?php
    session_start();
    $isLoggedIn = isset($_SESSION['username']);

    include '../config.php';
    $id = $_SESSION['nik'];
    $query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$id'");
    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
    <?php
        include 'assets/nav.php'
    ?>
    <a href="proses/logout.php" class="logout">Logout?</a>
    <div class="profile-container">
        <div class="profile">
            <h1><?=$row['nik']?></h1>
            <h4><?=$row['nama']?></h4>
            <p><?=$row['telp']?></p>
        </div>
    </div>
    <h1>Terimakasih Telah Mempercayai Kami, Mari Kita Bentuk Bersama Kota Batam yang Indah Untuk Masa Depan yang Cerah</h1>
    <a href="tabelpengaduan.php" class="history">Lihat History Pengaduan Anda</a>
</body>
</html>