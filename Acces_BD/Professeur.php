<?php
require_once __DIR__ . '/connexion.php';

function prof_get_all() {
    $conn = Connect();
    $res = $conn->query("SELECT * FROM prof");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function prof_get($id) {
    $conn = Connect();
    $stmt = $conn->prepare("SELECT * FROM prof WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function prof_create($code, $nom, $prenom, $email, $langues, $specialite) {
    $conn = Connect();
    $stmt = $conn->prepare("
        INSERT INTO prof(code, nom, prenom, email, langues, specialite)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssssss", $code, $nom, $prenom, $email, $langues, $specialite);
    return $stmt->execute();
}

function prof_update($id, $code, $nom, $prenom, $email, $langues, $specialite) {
    $conn = Connect();
    $stmt = $conn->prepare("
        UPDATE prof
        SET code=?, nom=?, prenom=?, email=?, langues=?, specialite=?
        WHERE id=?
    ");
    $stmt->bind_param("ssssssi", $code, $nom, $prenom, $email, $langues, $specialite, $id);
    return $stmt->execute();
}

function prof_delete($id) {
    $conn = Connect();
    $stmt = $conn->prepare("DELETE FROM prof WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>