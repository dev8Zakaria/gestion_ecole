<?php
session_start();
require_once __DIR__ . '/../../Acces_BD/Professeur.php';
$liste = prof_get_all();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Professeurs</title>
</head>
<body>
    <h2>Liste des Professeurs</h2>
    
    <a href="/IHM/Prof/form.php">
        <button>+ Nouveau Professeur</button>
    </a>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Langues</th>
            <th>Spécialité</th>
            <th>Actions</th>
        </tr>
        
        <?php foreach ($liste as $p): ?>
        <tr>
            <td><?php echo htmlspecialchars($p['code']); ?></td>
            <td><?php echo htmlspecialchars($p['nom']); ?></td>
            <td><?php echo htmlspecialchars($p['prenom']); ?></td>
            <td><?php echo htmlspecialchars($p['email']); ?></td>
            <td><?php echo htmlspecialchars($p['langues']); ?></td>
            <td><?php echo htmlspecialchars($p['specialite']); ?></td>
            <td>
                <a href="/IHM/Prof/form.php?id=<?php echo $p['id']; ?>">✏ Modifier</a>
                |
                <a href="/Gestion_Actions/Professeur.php?delete=<?php echo $p['id']; ?>"
                   onclick="return confirm('Supprimer ce professeur ?');">🗑 Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>