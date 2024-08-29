
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .modal-content {
            display: flex;
            position: relative;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 8px;
        }

        .modal-content h2 {
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            width: 100%; 
            align-items: center;
        }

        .modal-content form input {
            width: 80%;
            margin: 10px 0;
            padding: 10px;
            box-sizing: border-box;
        }

        .modal-content form input[type="submit"] {
            width: 10vw;
            background-color: #FFF;
            border: 1px solid #00712D;
            font-weight: bold;
            color: #00712D;
            transition: 0.2s;
        }

        .modal-content form input[type="submit"]:hover {
            background-color: #00712D;
            color: #FFF;
        }
    </style>
</head>
<body>
    <div class="modal-content">
        <h2>Login</h2>
        <form action="proseslogin.php" method="POST">
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <input type="submit" value="LOGIN" name="submit">
        </form>
    </div>
</body>
</html>