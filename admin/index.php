<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../petugas/style/styleindex.css">
</head>
<body>
    <a href="proses/logout.php">Logout?</a>
    <h1>Welcome Petugas : <?= $_SESSION['nama_petugas']?></h1>
    <p>Riwayat Laporan dari Masyarakat Kota Batam</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No.</td>
                <td>Tanggal Pengaduan</td>
                <td>NIK</td>
                <td>Isi Laporan</td>
                <td>Foto</td>               
                <td>Aksi</td>               
            </tr>
        </thead>
        <tbody>
            <?php
                include '../config.php';
                $query = mysqli_query($koneksi, "SELECT * FROM pengaduan");
                $no = 1;
                while($row=mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tgl_pengaduan'] ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['isi_laporan'] ?></td>
                <td><img src="../masyarakat/foto_laporan/<?= $row['foto'] ?>" alt="" style="width:100px; height:100px; object-fit:cover;"></td>
                <td>
                    <?php if ($row['status'] == 0): ?>
                        <!-- Jika status masih "Terkirim" -->
                        <a href="ubahstatus.php?id=<?= $row['id_pengaduan'] ?>&aksi=terima" class="btn btn-success">Terima</a> 
                        | 
                        <a href="ubahstatus.php?id=<?= $row['id_pengaduan'] ?>&aksi=tolak" class="btn btn-danger">Tolak</a>
                    <?php elseif ($row['status'] == 'proses'): ?>
                        <!-- Jika status sudah "Diproses" -->
                        <a href="beritanggapan.php?id=<?= $row['id_pengaduan'] ?>" class="btn btn-primary">Beri Tanggapan</a>
                        |
                        <a href="cetakpengaduan.php?id=<?= $row['id_pengaduan'] ?>" class="btn btn-success">Cetak Pengaduan</a>
                    <?php elseif ($row['status'] == 'selesai'): ?>
                        <a href="historytanggapan.php?id=<?= $row['id_pengaduan'] ?>" class="btn btn-secondary">Lihat Tanggapan dan Cetak</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>