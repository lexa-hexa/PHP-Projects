<?php
$correct_username = "admin";
$correct_password = "123456";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $correct_username && $password === $correct_password) {
    header("Location: admin_panel.php");
    exit;
} else {
    echo "Hatalı kullanıcı adı veya şifre. Lütfen tekrar deneyin.";
}


session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
