<?php
$tarifler = array(
    1 => array(
        'baslik' => 'Fırında Tavuk',
        'malzemeler' => 'Tavuk, patates, zeytinyağı, tuz, karabiber',
        'tarif' => 'Tavukları patateslerle birlikte fırında pişirin.',
        'resim' => 'firinda-tavuk.jpg'
    ),
    2 => array(
        'baslik' => 'Mantar Sote',
        'malzemeler' => 'Mantar, soğan, sıvı yağ, tuz, karabiber',
        'tarif' => 'Mantarları soteleyin ve üzerine doğranmış soğan ekleyin.',
        'resim' => 'mantar-sote.jpg'
    ),
    3 => array(
        'baslik' => 'Ispanaklı Börek',
        'malzemeler' => 'Yufka, ıspanak, beyaz peynir, tuz, yoğurt',
        'tarif' => 'Ispanakları ve peyniri yufkaların arasına yerleştirip rulo yapın ve fırında pişirin.',
        'resim' => 'ispanakli-borek.jpg'
    )
);

$tarif_id = $_GET['id'];

$tarif = $tarifler[$tarif_id];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tarif['baslik']; ?></title>
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

        p {
            margin-bottom: 10px;
        }

        .malzemeler {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo $tarif['baslik']; ?></h1>

    <img src="images/<?php echo $tarif['resim']; ?>" alt="<?php echo $tarif['baslik']; ?>">

    <p><span class="malzemeler">Malzemeler:</span> <?php echo $tarif['malzemeler']; ?></p>
    <p><span class="malzemeler">Tarif:</span> <?php echo $tarif['tarif']; ?></p>
</div>

</body>
</html>
