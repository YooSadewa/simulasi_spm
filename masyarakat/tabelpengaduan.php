<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-image: url(assets/694.jpg); background-size: cover; background-repeat: no-repeat; background-position: left; width: 100%; height: 100vh;">
    <br>
    <a href="profile.php" style="text-decoration: none; color: #FFF; margin: 20px; background-color: #00712D; padding: 10px; border-radius: 26px;">Back to Profile</a>
    <table class="table table-striped mt-4">
    <thead>
        <tr>
            <td>No</td>
            <td>Tanggal Pengaduan</td>
            <td>NIK</td>
            <td>Foto Laporan</td>
            <td>Isi Laporan</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../config.php';
        session_start();
        $id = $_SESSION['nik']; // Pastikan ini adalah NIK yang benar
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik = '$id'");

        while ($row = mysqli_fetch_array($query)) {
            // Tentukan status berdasarkan nilai kolom status
            $statusText = '';
            $statusClass = '';

            switch ($row['status']) {
                case 0:
                    $statusText = 'Terkirim';
                    break;
                case 1:
                    $statusText = 'Diproses';
                    $statusClass = 'bg-warning';
                    break;
                case 2:
                    $statusText = 'Lihat Tanggapan';
                    $statusClass = 'bg-danger';
                    break;
            }
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tgl_pengaduan'] ?></td>
                <td><?= $row['nik'] ?></td>
                <td><img src="foto_laporan/<?= $row['foto'] ?>" alt="" style="width: 100px; height: 100px;"></td>
                <td><?= $row['isi_laporan'] ?></td>
                <td class="<?= $statusClass ?>"><?= $statusText ?></td>
            </tr>
            <?php 
        }
        ?>
    </tbody>
</table>


    <a href="buatlaporan.php" style="display: flex; justify-content: center; text-decoration: none; color: #FFF; padding: 12px; background-color: #00712D; width: fit-content; margin: auto; text-transform: uppercase; font-weight: 600;">Buat Laporan Baru</a>
</body>
</html>