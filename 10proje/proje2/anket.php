<?php
$name = $age = $color = $favorite_movie = $favorite_series = $favorite_song = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $age = test_input($_POST["age"]);
    $color = test_input($_POST["color"]);
    $favorite_movie = test_input($_POST["favorite_movie"]);
    $favorite_series = test_input($_POST["favorite_series"]);
    $favorite_song = test_input($_POST["favorite_song"]);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #6a5acd;
        }
        label {
            color: #6a5acd;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #6a5acd;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #483d8b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Anket</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Ad Soyad:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="age">Yaş:</label>
            <input type="number" id="age" name="age" required><br>
            <label for="color">En Sevdiğin Renk:</label>
            <input type="text" id="color" name="color" required><br>
            <label for="favorite_movie">Favori Filmin:</label>
            <input type="text" id="favorite_movie" name="favorite_movie" required><br>
            <label for="favorite_series">Favori Dizin:</label>
            <input type="text" id="favorite_series" name="favorite_series" required><br>
            <label for="favorite_song">Favori Şarkın:</label>
            <input type="text" id="favorite_song" name="favorite_song" required><br>
            <input type="submit" name="submit" value="Gönder">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Cevapların:</h2>";
            echo "Ad Soyad: " . $name . "<br>";
            echo "Yaşınız: " . $age . "<br>";
            echo "Favori Renginiz: " . $color . "<br>";
            echo "Favori Filminiz: " . $favorite_movie . "<br>";
            echo "Favori Diziniz: " . $favorite_series . "<br>";
            echo "Favori Şarkınız: " . $favorite_song . "<br>";
        }
        ?>
    </div>
</body>
</html>
