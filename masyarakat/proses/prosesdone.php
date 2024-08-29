<?php
    include '../../config.php';

    if(isset($_POST['submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        $query = mysqli_query($koneksi, "UPDATE masyarakat SET nik = '$nik', nama = '$nama', username = '$username', password = '$password', telp = '$telp' WHERE nik = '$nik'");
        header("location:../index.php");
    }
?>