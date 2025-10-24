<?php
session_start();
require_once __DIR__ . '/../../Acces_BD/Etudiant.php';
$liste = etudiant_get_all();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Étudiants</title>
</head>
<body>

<h2>Liste des Étudiants</h2>

<a href="/IHM/Etudiant/form.php">
    <button>+ Nouvel étudiant</button>
</a>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Sexe</th>
        <th>Filière</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($liste as $e): ?>
    <tr>
        <td><?php echo htmlspecialchars($e['code']); ?></td>
        <td><?php echo htmlspecialchars($e['nom']); ?></td>
        <td><?php echo htmlspecialchars($e['prenom']); ?></td>
        <td><?php echo htmlspecialchars($e['email']); ?></td>
        <td><?php echo htmlspecialchars($e['sexe']); ?></td>
        <td><?php echo htmlspecialchars($e['filiere']); ?></td>
        <td>
            <a href="/IHM/Etudiant/form.php?id=<?php echo $e['id']; ?>">✏️ Modifier</a>
            |
            <a href="/Gestion_Actions/Etudiant.php?delete=<?php echo $e['id']; ?>"
               onclick="return confirm('Supprimer cet étudiant ?');">🗑 Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>