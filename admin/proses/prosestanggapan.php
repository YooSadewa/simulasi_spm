<?php
    include '../../config.php';
    
    if(isset($_POST['submit'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $nama_petugas = $_POST['nama_petugas'];
        $tgl_tanggapan = $_POST['tgl_tanggapan'];
        $tanggapan = $_POST['tanggapan'];
        $id_petugas = $_POST['id_petugas'];

        $query = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas') ");
        if($query) {
            $updateQuery = mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan = '$id_pengaduan'");
            if($updateQuery) {
                header("location:../index.php");
            } else {
                echo "<script>alert('Gagal mengubah status pengaduan')</script>";
            }
        } else {
            echo "<script>alert('Gagal menyimpan tanggapan')</script>";
        }
    }
?>