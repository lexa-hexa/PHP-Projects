<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #333333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .welcome-text {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
            text-align: center;
            animation: blink 1s infinite alternate;
        }

        .error-text {
            color: #dc3545;
            text-align: center;
        }

        @keyframes blink {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <?php
    // Kullanıcı adı ve şifre kontrolü
    $username = "admin";
    $password = "12345";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        if ($entered_username === $username && $entered_password === $password) {
            echo '<div class="welcome-text">Hoşgeldin, admin!</div>';
        } else {
            echo '<div class="error-text">Kullanıcı adı veya şifre yanlış!</div>';
        }
    }
    ?>

    <form method="post">
        <h2>Admin Girişi</h2>
        <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
        <input type="password" name="password" placeholder="Şifre" required><br>
        <input type="submit" value="Giriş Yap">
    </form>
</div>

</body>
</html>
