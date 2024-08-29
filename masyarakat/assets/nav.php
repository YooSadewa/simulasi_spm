<style>
    nav {
        width: 100%;
        height: 70px;
        background: #00712D;
        display: flex;
        align-items: center;
        position: fixed;
        top: 0;
        right: 0;
    }

    nav img {
        height: 60px;
        margin: 0 30px;
    }

    nav h1 {
        text-transform: uppercase;
        color: #FFF; 
        margin-top: 0;
    }

    nav a {
        color: #FFF;
        text-decoration: none;
        margin-right: 20px;
        text-align: end;
        width: 40%;
        font-weight: 400;
        padding: 0;
    }

    nav ul {
        display: flex;
        flex-direction: row;
        list-style: none;
        width: 40%;
        justify-content: end;
        gap: 20px;
    }

    nav ul li {
        transition: 0.5s;
        cursor: pointer;
    }

    nav ul li:hover {
        transform: translateY(-5px);
    }

</style>

<body>
    <nav>
        <img src="assets/lambang_batam.png" alt="">
        <h1>sistem pengaduan masyarakat kota batam</h1>
        <ul>
            <li>
                <?php if($isLoggedIn): ?>
                    <a href="profile.php" class="fa-regular fa-user"></a>
                <?php else: ?>     
                    <a id="openModalBtn">Login</a></li>
                <?php endif; ?>
        </ul>
    </nav>
</body>