<?php
    session_start();
    include '../../config.php';

    if(isset($_POST['submit'])) {
        $nik = $_SESSION['nik'];
        $tgl_pengaduan = $_POST['tgl_pengaduan'];
        $laporan = $_POST['laporan'];
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $folder = '../foto_laporan/' .$foto;
        $status = $_POST['status']; 

        $query = mysqli_query($koneksi, "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES ('$tgl_pengaduan', '$nik', '$laporan', '$foto', '$status')");
        if (move_uploaded_file($tmp_name,$folder)) {
            header("location:../tabelpengaduan.php"); 
            }
    }
?>