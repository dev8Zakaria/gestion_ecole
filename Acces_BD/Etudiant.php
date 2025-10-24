<?php
require_once __DIR__ . '/connexion.php';

function etudiant_get_all() {
    $conn = Connect();
    $res = $conn->query("SELECT * FROM etudiant");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function etudiant_get($id) {
    $conn = Connect();
    $stmt = $conn->prepare("SELECT * FROM etudiant WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function etudiant_create($code,$nom,$prenom,$email,$sexe,$filiere) {
    $conn = Connect();
    $stmt = $conn->prepare("
        INSERT INTO etudiant(code,nom,prenom,email,sexe,filiere)
        VALUES (?,?,?,?,?,?)
    ");
    $stmt->bind_param("ssssss",$code,$nom,$prenom,$email,$sexe,$filiere);
    return $stmt->execute();
}

function etudiant_update($id,$code,$nom,$prenom,$email,$sexe,$filiere) {
    $conn = Connect();
    $stmt = $conn->prepare("
        UPDATE etudiant
        SET code=?, nom=?, prenom=?, email=?, sexe=?, filiere=?
        WHERE id=?
    ");
    $stmt->bind_param("ssssssi",$code,$nom,$prenom,$email,$sexe,$filiere,$id);
    return $stmt->execute();
}

function etudiant_delete($id) {
    $conn = Connect();
    $stmt = $conn->prepare("DELETE FROM etudiant WHERE id=?");
    $stmt->bind_param("i",$id);
    return $stmt->execute();
}
?>