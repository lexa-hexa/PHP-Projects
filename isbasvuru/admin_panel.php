<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .button-container {
            text-align: center;
        }
        .button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 0 10px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Yönetici Paneli</h2>
        <div class="button-container">
            <a href="admin_panel.php" class="button">Başvuruları Görüntüle</a>
            <a href="basvuru_ekle.html" class="button">Başvuru Ekle</a>
            <a href="logout.php" class="button">Çıkış Yap</a>
        </div>
    </div>

    



</body>
</html>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvurular</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Başvurular</h1>
        <table>
            <tr>
                <th>Ad</th>
                <th>Soyad</th>
                <th>E-posta</th>
                <th>Telefon</th>
                <th>Eğitim</th>
                <th>Tecrübe</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "basvuru_formu");

            if ($conn->connect_error) {
                die("Veritabanına bağlanılamadı: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM basvuru";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ad"] . "</td>";
                    echo "<td>" . $row["soyad"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo "<td>" . $row["egitim"] . "</td>";
                    echo "<td>" . $row["tecrube"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Başvuru bulunamadı.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
