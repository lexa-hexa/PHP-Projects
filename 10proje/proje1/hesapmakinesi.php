<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Makinesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #4a90e2;
            margin-bottom: 20px;
        }
        input[type="number"],
        select,
        .button {
            width: calc(100% - 40px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="number"]:focus,
        select:focus,
        .button:focus {
            outline: none;
            border-color: #4a90e2;
        }
        .button {
            background-color: #4a90e2;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #357dbf;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hesap Makinesi</h2>
        <form id="calculatorForm" action="" method="post">
            <input type="number" name="sayi1" placeholder="Sayı 1" required><br>
            <input type="number" name="sayi2" placeholder="Sayı 2" required><br>
            <select name="islem">
                <option value="+">Toplama</option>
                <option value="-">Çıkarma</option>
                <option value="*">Çarpma</option>
                <option value="/">Bölme</option>
                <option value="**">Üs Alma</option>
                <option value="%%">Mod Alma</option>
            </select>
            <br>
            <input type="submit" class="button" value="Hesapla">
            <input type="button" class="button" value="Sıfırla" onclick="resetForm()">
            <br>
            <div class="result">
                <?php
                if(isset($_POST["sayi1"], $_POST["sayi2"], $_POST["islem"])){
                    $sayi1 = $_POST["sayi1"];
                    $sayi2 = $_POST["sayi2"];
                    $islem = $_POST["islem"];
                    switch($islem){
                        case "+":
                            $sonuc = $sayi1 + $sayi2;
                            break;
                        case "-":
                            $sonuc = $sayi1 - $sayi2;
                            break;
                        case "*":
                            $sonuc = $sayi1 * $sayi2;
                            break;
                        case "/":
                            $sonuc = $sayi1 / $sayi2;
                            break;
                        case "**":
                            $sonuc = $sayi1 ** $sayi2;
                            break;
                        case "%%":
                            $sonuc = $sayi1 % $sayi2;
                            break;
                    }
                    echo "Sonuç: {$sonuc}";
                }
                ?>
            </div>
        </form>
    </div>
    <script>
        function resetForm() {
            document.getElementById("calculatorForm").reset();
        }
    </script>
</body>
</html>
