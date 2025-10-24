<?php
require_once __DIR__ . '/../Acces_BD/Etudiant.php';

// Création / Mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code    = $_POST['code'];
    $nom     = $_POST['nom'];
    $prenom  = $_POST['prenom'];
    $email   = $_POST['email'];
    $sexe    = $_POST['sexe'];
    $filiere = $_POST['filiere'];

    if (isset($_POST['create'])) {
        etudiant_create($code,$nom,$prenom,$email,$sexe,$filiere);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        etudiant_update($id,$code,$nom,$prenom,$email,$sexe,$filiere);
    }

    header("Location: /IHM/Etudiant/affichage.php");
    exit();
}

// Suppression
if (isset($_GET['delete'])) {
    etudiant_delete($_GET['delete']);
    header("Location: /IHM/Etudiant/affichage.php");
    exit();
}
?>