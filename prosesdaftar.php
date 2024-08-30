<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $status = 'admin';
    
    $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
    if (mysqli_num_rows($query) > 0) {
        $errorMessage = "";
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['username'] == $username) {
                $errorMessage .= "Username Telah Terdaftar, Silahkan Daftar Ulang\\n";
            }
        }
        // Use a JavaScript alert and a delay for redirection
        echo "<script>alert('$errorMessage'); setTimeout(function() { window.location.href='register.php'; }, 300);</script>";
    } else {
        if (mysqli_query($koneksi, "INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp, level) VALUES (null, '$nama_petugas', '$username', '$password', '$telp', '$status')")) {
            header("location:login.php");
        }
    }
}
?>
