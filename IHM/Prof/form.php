<?php
session_start();
require_once __DIR__ . '/../../Acces_BD/Professeur.php';

$editing = false;
if (isset($_GET['id'])) {
    $editing = true;
    $p = prof_get($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $editing ? "Modifier Professeur" : "Ajouter Professeur"; ?></title>
</head>
<body>
    <h2><?php echo $editing ? "Modifier Professeur" : "Ajouter Professeur"; ?></h2>
    
    <form method="post" action="/Gestion_Actions/Professeur.php">
        <?php if ($editing): ?>
            <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
        <?php endif; ?>
        
        <label>Code</label>
        <input type="text" name="code" value="<?php echo $editing ? $p['code'] : ""; ?>" required><br>
        
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $editing ? $p['nom'] : ""; ?>" required><br>
        
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?php echo $editing ? $p['prenom'] : ""; ?>" required><br>
        
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $editing ? $p['email'] : ""; ?>" required><br>
        
        <label>Langues</label>
        <input type="text" name="langues" value="<?php echo $editing ? $p['langues'] : ""; ?>" required><br>
        
        <label>Spécialité</label>
        <input type="text" name="specialite" value="<?php echo $editing ? $p['specialite'] : ""; ?>" required><br><br>
        
        <button type="submit" name="<?php echo $editing ? 'update' : 'create'; ?>">
            <?php echo $editing ? "Mettre à jour" : "Ajouter"; ?>
        </button>
    </form>
    
    <a href="/IHM/Prof/affichage.php">← Retour à la liste</a>
</body>
</html>