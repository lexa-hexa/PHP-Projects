<?php
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = $_POST["length"];
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+";
    $password = substr(str_shuffle($characters), 0, $length);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Oluşturucu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #4682b4;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4682b4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4169e1;
        }
        .password {
            font-size: 20px;
            text-align: center;
            color: #4682b4;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Şifre Oluşturucu</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="number" name="length" placeholder="4-20 arasında bir sayı girin" min="4" max="20" required><br>
            <input type="submit" name="submit" value="Oluştur">
        </form>
        <div class="password">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "Oluşturulan Şifre: " . $password;
            }
            ?>
        </div>
    </div>
</body>
</html>
