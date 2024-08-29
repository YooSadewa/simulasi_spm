<?php
include '../../config.php';

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik='$nik' OR username='$username'");
    if (mysqli_num_rows($query) > 0) {
        $errorMessage = "";
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['nik'] == $nik) {
                $errorMessage .= "NIK Telah Terdaftar, Silahkan Daftar Ulang\\n";
            }
            if ($row['username'] == $username) {
                $errorMessage .= "Username Telah Terdaftar, Silahkan Daftar Ulang\\n";
            }
        }
        // Use a JavaScript alert and a delay for redirection
        echo "<script>alert('$errorMessage'); setTimeout(function() { window.location.href='../index.php'; }, 300);</script>";
    } else {
        if (mysqli_query($koneksi, "INSERT INTO masyarakat (nik, username, password) VALUES ('$nik', '$username', '$password')")) {
            header("location:../lengkapiprofil.php");
        }
    }
}
?>
