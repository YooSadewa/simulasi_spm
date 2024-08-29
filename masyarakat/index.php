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
    <link rel="stylesheet" href="style/styleindex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
    <?php
        include 'assets/nav.php';
    ?>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form action="proses/proseslogin.php" method="POST">
                <input type="text" name="username" placeholder="Masukkan Username" required>
                <input type="password" name="password" placeholder="Masukkan Password" required>
                <input type="submit" value="LOGIN" name="submit">
            </form>
        </div>
    </div>
    <header>
        <div class="content">
            <h1>tempat pengaduan online masyarakat kota batam</h1>
            <p>ciptakan kota batam yang maju dan sejahtera</p>
            <a href="buatlaporan.php" id="buatLaporanBtn">buat laporan sekarang</a>
            <div class="vertical-line"></div>
        </div>
    </header>
    
    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];
        var buatLaporanBtn = document.getElementById("buatLaporanBtn");

        btn.onclick = function() {
            modal.style.display = "flex";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        buatLaporanBtn.onclick = function(event) {
            <?php if (!$isLoggedIn): ?>
                event.preventDefault();
                modal.style.display = "flex";
            <?php else: ?>
                window.location.href = 'buatlaporan.php';
            <?php endif; ?>
        }
    </script>
</body>
</html>
