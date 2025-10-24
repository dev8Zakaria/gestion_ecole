<?php
require_once __DIR__ . '/../Acces_BD/Login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    if (login($email, $password)) {
        header("Location: /IHM/accueil.php");
        exit();
    } else {
        echo "Identifiants invalides";
    }
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}
?>
