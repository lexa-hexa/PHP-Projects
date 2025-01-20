<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Genel Kültür Soruları</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f3e5f5;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #673ab7;
    }

    form {
        margin-bottom: 20px;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    button {
        background-color: #7c4dff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #651fff;
    }

    ul {
        padding: 0;
    }

    li {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        list-style-type: none;
    }

    li strong {
        color: #7c4dff;
    }

    p {
        margin: 10px 0;
        text-align: center;
        color: #673ab7;
    }

    .question {
        background-color: #ba68c8;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
        color: #fff;
    }

    .choices {
        background-color: #ce93d8;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Genel Kültür Soruları</h2>

    <?php
    $questions = array(
        "Türkiye'nin başkenti hangi şehirdir?",
        "En büyük gezegen hangisidir?",
        "İstanbul'un diğer adı nedir?",
        "Ay'ın yüzeyinde insan ayak izi bırakan ilk kişi kimdir?",
        "Ülkemizdeki en büyük göl hangisidir?",
        "Dünyadaki en uzun nehir hangisidir?",
        "Türkiye'nin en kalabalık şehri hangisidir?",
        "Bir buçuk litre suyun donma noktası kaç derecedir?",
        "Keloğlan'ın hırsızlık yaptığı elmasın sahibi kimdir?",
        "Mona Lisa tablosunun ressamı kimdir?"
    );

    $choices = array(
        array("Ankara", "İstanbul", "İzmir", "Bursa"),
        array("Jüpiter", "Mars", "Venüs", "Satürn"),
        array("Bursa", "İzmir", "Ankara", "Bodrum"),
        array("Neil Armstrong", "Buzz Aldrin", "Yuri Gagarin", "Sally Ride"),
        array("Van Gölü", "Tuz Gölü", "Beyşehir Gölü", "Gölcük Gölü"),
        array("Nil Nehri", "Amazon Nehri", "Kızıldeniz", "Mekong Nehri"),
        array("İstanbul", "Ankara", "İzmir", "Bursa"),
        array("-2", "0", "1", "4"),
        array("Kral", "Padişah", "Sultan", "Kraliçe"),
        array("Leonardo da Vinci", "Pablo Picasso", "Vincent van Gogh", "Michelangelo")
    );

    $answers = array(0, 0, 1, 0, 0, 1, 0, 1, 2, 0);

    if(isset($_POST['submit'])) {
        $score = 0;
        echo "<ul>";
        for($i = 0; $i < 10; $i++) {
            $answer = $_POST["q$i"];
            echo "<li>";
            echo "<div class='question'><strong>" . ($i+1) . ". Soru:</strong> " . $questions[$i] . "</div>";
            echo "<div class='choices'><strong>Doğru Cevap:</strong> " . $choices[$i][$answers[$i]] . "<br>";
            echo "<strong>Sizin Cevabınız:</strong> " . $choices[$i][$answer] . "</div></li>";
            if($answer == $answers[$i]) {
                $score++;
            }
        }
        echo "</ul>";
        echo "<p>Toplam puanınız: $score/10</p>";
        exit();
    }
    ?>

    <form method="post">
        <?php for($i = 0; $i < 10; $i++): ?>
            <div class="question"><?php echo ($i+1) . ". " . $questions[$i]; ?></div>
            <div class="choices">
                <?php foreach($choices[$i] as $key => $choice): ?>
                    <label>
                        <input type="radio" name="q<?php echo $i; ?>" value="<?php echo $key; ?>" required>
                        <?php echo $choice; ?>
                    </label>
                <?php endforeach; ?>
            </div><br>
        <?php endfor; ?>
        <button type="submit" name="submit">Sonuçları Göster</button>
    </form>
</div>

</body>
</html>
