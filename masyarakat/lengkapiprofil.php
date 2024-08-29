<?php
include '../config.php';
$query = mysqli_query($koneksi, "SELECT * FROM masyarakat");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylelaporan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        nav {
            width: 100%;
            height: 70px;
            background: #00712D;
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            right: 0;
        }

        nav img {
            height: 60px;
            margin: 0 30px;
        }

        nav h1 {
            text-transform: uppercase;
            color: #FFF; 
            margin-top: 0;
        }

        nav a {
            color: #FFF;
            text-decoration: none;
            margin-right: 20px;
            text-align: end;
            width: 40%;
            font-weight: 400;
            padding: 0;
        }

        nav ul {
            display: flex;
            flex-direction: row;
            list-style: none;
            width: 40%;
            justify-content: end;
            gap: 20px;
        }

        nav ul li {
            transition: 0.5s;
            cursor: pointer;
        }

        nav ul li:hover {
            transform: translateY(-5px);
        }

    </style>
</head>
<body>
    <nav>
        <img src="assets/lambang_batam.png" alt="">
        <h1>sistem pengaduan masyarakat kota batam</h1>
    </nav>
    <div class="form-container">
        <h1>Lengkapi Profilmu</h1>
        <form action="proses/prosesdone.php" method="post"  enctype="multipart/form-data">
            <input type="text" name="nama" value="" id="nama" placeholder="Masukkan Nama Anda">
            <input type="tel" name="nik" value="<?= $row['nik']?>" placeholder="Masukkan NIK Anda">
            <input type="text" name="username" value="<?= $row['username']?>" id="nama" placeholder="Masukkan Username Anda">
            <input type="text" name="password" value="<?= $row['password']?>" id="nama" placeholder="Masukkan Password Anda">
            <input type="number" name="telp" value="" id="nama" placeholder="Masukkan No. Telp">
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>