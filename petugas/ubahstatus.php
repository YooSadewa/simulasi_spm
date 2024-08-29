<?php
include '../config.php'; // Pastikan path ke config.php sudah benar

if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id_pengaduan = $_GET['id'];
    $aksi = $_GET['aksi'];

    if ($aksi == 'terima') {
        // Update status menjadi 'proses'
        $query = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$id_pengaduan'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>window.history.back()</script>"; // Redirect kembali ke halaman sebelumnya
        } else {
            echo "Gagal mengubah status!";
        }
    } elseif ($aksi == 'tolak') {
        // Hapus laporan dari database
        $query = "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>window.history.back()</script>"; // Redirect kembali ke halaman sebelumnya
        } else {
            echo "Gagal menghapus laporan!";
        }
    } else {
        echo "Aksi tidak dikenali!";
    }
} else {
    echo "ID atau aksi tidak ditemukan!";
}
?>
