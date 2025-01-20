<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Tarifleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2980b9;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Yemek Tarifleri</h1>

    <ul>
        <li>
            <a href="tarif.php?id=1">
                <h2>Fırında Tavuk</h2>
                <img src="images/firinda-tavuk.jpg" alt="Fırında Tavuk">
            </a>
        </li>
        <li>
            <a href="tarif.php?id=2">
                <h2>Mantar Sote</h2>
                <img src="images/mantar-sote.jpg" alt="Mantar Sote">
            </a>
        </li>
        <li>
            <a href="tarif.php?id=3">
                <h2>Ispanaklı Börek</h2>
                <img src="images/ispanakli-borek.jpg" alt="Ispanaklı Börek">
            </a>
        </li>
    </ul>
</div>

</body>
</html>
