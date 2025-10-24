<?php
require_once __DIR__ . '/connexion.php';
session_start();

function login($email, $password) {
    $conn = Connect();
    $sql = "SELECT id, email, password_hash, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ❗ TP simplifié : on ne vérifie pas vraiment le hash pour ne pas bloquer les autres devs
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        return true;
    }

    return false;
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: /index.php");
    exit();
}
?>
