<?php
session_start();
require_once __DIR__ . '/../../Acces_BD/Etudiant.php';

$editing = false;
if (isset($_GET['id'])) {
    $editing = true;
    $etu = etudiant_get($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $editing ? "Modifier Étudiant" : "Ajouter Étudiant"; ?></title>
</head>
<body>

<h2><?php echo $editing ? "Modifier Étudiant" : "Ajouter Étudiant"; ?></h2>

<form method="post" action="/Gestion_Actions/Etudiant.php">
    <?php if ($editing): ?>
        <input type="hidden" name="id" value="<?php echo $etu['id']; ?>">
    <?php endif; ?>

    <label>Code</label>
    <input type="text" name="code" value="<?php echo $editing ? $etu['code'] : ""; ?>" required><br>

    <label>Nom</label>
    <input type="text" name="nom" value="<?php echo $editing ? $etu['nom'] : ""; ?>" required><br>

    <label>Prénom</label>
    <input type="text" name="prenom" value="<?php echo $editing ? $etu['prenom'] : ""; ?>" required><br>

    <label>Email</label>
    <input type="email" name="email" value="<?php echo $editing ? $etu['email'] : ""; ?>" required><br>

    <label>Sexe</label>
    <select name="sexe">
        <option value="M" <?php if($editing && $etu['sexe']=='M') echo 'selected'; ?>>M</option>
        <option value="F" <?php if($editing && $etu['sexe']=='F') echo 'selected'; ?>>F</option>
    </select><br>

    <label>Filière</label>
    <input type="text" name="filiere" value="<?php echo $editing ? $etu['filiere'] : ""; ?>" required><br><br>

    <button type="submit" name="<?php echo $editing ? 'update' : 'create'; ?>">
        <?php echo $editing ? "Mettre à jour" : "Ajouter"; ?>
    </button>
</form>

<a href="/IHM/Etudiant/affichage.php">← Retour à la liste</a>

</body>
</html>