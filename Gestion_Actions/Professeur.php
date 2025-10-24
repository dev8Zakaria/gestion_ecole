<?php
require_once __DIR__ . '/../Acces_BD/Professeur.php';

// CREATE / UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $langues = $_POST['langues'];
    $specialite = $_POST['specialite'];
    
    if (isset($_POST['create'])) {
        prof_create($code, $nom, $prenom, $email, $langues, $specialite);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        prof_update($id, $code, $nom, $prenom, $email, $langues, $specialite);
    }
    header("Location: /IHM/Prof/affichage.php");
    exit();
}

// DELETE
if (isset($_GET['delete'])) {
    prof_delete($_GET['delete']);
    header("Location: /IHM/Prof/affichage.php");
    exit();
}
?>