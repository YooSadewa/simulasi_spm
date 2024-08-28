<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylelaporan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php
        include 'assets/nav.php';
    ?>
    <div class="form-container">
        <h1>Buat Laporan</h1>
        <form action="" method="post">
            <input type="text" name="nama" disabled value="Thio" id="nama">
            <input type="tel" name="nik" disabled value="66574923">
            <textarea name="laporan" id="" placeholder="Berikan Laporanmu"></textarea> 
            <label for="foto"><h2>Sertakan Foto?</h2>
                <input type="file" name="foto" id="foto" multiple>                
            </label>
            <div id="preview"></div>
            <input type="submit" value="Kirimkan Laporan" name="submit">
        </form>
    </div>

    <script>
    // Array untuk menyimpan file yang dipilih
    let selectedFiles = [];

    document.getElementById('foto').addEventListener('change', function() {
        const preview = document.getElementById('preview');
        
        // Menggabungkan file yang baru dipilih dengan file yang sudah ada
        for (let i = 0; i < this.files.length; i++) {
            selectedFiles.push(this.files[i]);
        }

        // Kosongkan pratinjau sebelumnya
        preview.innerHTML = '';

        // Tampilkan semua file yang telah dipilih
        selectedFiles.forEach(file => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);
        });
    });
</script>
</body>
</html>