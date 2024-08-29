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
    <?php include 'assets/nav.php'; ?>

    <!-- Modal Login -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form action="proses/proseslogin.php" method="POST">
                <input type="text" name="username" placeholder="Masukkan Username" required>
                <input type="password" name="password" placeholder="Masukkan Password" required>
                <a href="#" id="openRegisterModal">Tidak Punya Akun? Daftar Sekarang</a>
                <input type="submit" value="LOGIN" name="submit">
            </form>
        </div>
    </div>

    <!-- Modal Daftar -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="closedaftar">&times;</span>
            <h2>Daftar</h2>
            <form action="proses/prosesdaftar.php" method="POST">
                <input type="tel" name="nik" placeholder="Masukkan NIK" required>
                <input type="text" name="username" placeholder="Masukkan Username" required>
                <input type="password" name="password" placeholder="Masukkan Password" required>
                <input type="submit" value="DAFTAR" name="submit">
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
        var loginModal = document.getElementById("myModal");
        var registerModal = document.getElementById("registerModal");
        var span = document.getElementsByClassName("close");
        var span2 = document.getElementsByClassName("closedaftar");

        document.getElementById("buatLaporanBtn").onclick = function(event) {
            <?php if (!$isLoggedIn): ?>
                event.preventDefault();
                loginModal.style.display = "flex";
            <?php else: ?>
                window.location.href = 'buatlaporan.php';
            <?php endif; ?>
        }

        document.getElementById("openModalBtn").onclick = function() {
            var modal = document.getElementById("myModal");
            modal.style.display = "flex";
        };

        document.getElementById("openRegisterModal").onclick = function(event) {
            event.preventDefault();
            loginModal.style.display = "none";
            registerModal.style.display = "flex";
        }

        // Close the modals when clicking on the close button
        Array.from(span).forEach(function(element) {
            element.onclick = function() {
                loginModal.style.display = "none";
                registerModal.style.display = "none";
            }
        });

        Array.from(span2).forEach(function(element) {
            element.onclick = function() {
                loginModal.style.display = "flex";
                registerModal.style.display = "none";
            }
        });

        // Close the modals when clicking outside of the modal
        window.onclick = function(event) {
            if (event.target == loginModal) {
                loginModal.style.display = "none";
            }
            if (event.target == registerModal) {
                registerModal.style.display = "none";
            }
        }
    </script>
</body>
</html>
