<?php
    include '../../config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$username' and password = '$password'");

    if($user->num_rows>0) {
        $data = mysqli_fetch_assoc($user);
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header("location:../buatlaporan.php");
    } else {
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<script>window.history.back()</script>";
    }
?>