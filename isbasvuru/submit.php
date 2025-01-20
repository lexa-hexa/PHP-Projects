<?php

$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$egitim = $_POST['egitim'];
$tecrube = $_POST['tecrube'];


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "basvuru_formu"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

$sql = "INSERT INTO basvuru (ad, soyad, email, telefon, egitim, tecrube)
VALUES ('$ad', '$soyad', '$email', '$telefon', '$egitim', '$tecrube')";

if ($conn->query($sql) === TRUE) {
    echo "Başvuru başarıyla alındı.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
