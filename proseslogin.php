<?php
    include 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username' and password = '$password'");
    if($user->num_rows>0) {
        $data = mysqli_fetch_assoc($user);
        session_start();
        $_SESSION['id_petugass'] = $data['id_petugass'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];

        if($data['level']=="admin") {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = "admin";
            $_SESSION['id_petugas'] = $data['id_petugas'];
		    $_SESSION['nama_petugas'] = $data['nama_petugas'];

            header("location:admin/index.php");
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = "petugas";
            $_SESSION['id_petugas'] = $data['id_petugas'];
		    $_SESSION['nama_petugas'] = $data['nama_petugas'];

            header("location:petugas/index.php");
        }
    } else {
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<script>window.history.back()</script>";
    }
?>
