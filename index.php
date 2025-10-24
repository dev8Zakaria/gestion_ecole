<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion École - Connexion</title>
</head>
<body>
<h1>Application Gestion École</h1>

<?php if (!isset($_SESSION['user_id'])): ?>
    <h2>Authentification</h2>
    <form method="post" action="/Gestion_Actions/login.php">
        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mot de passe</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
<?php else: ?>
    <p>Connecté en tant que <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
    <a href="/IHM/accueil.php">Aller au tableau de bord</a><br>
    <a href="/Gestion_Actions/login.php?action=logout">Se déconnecter</a>
<?php endif; ?>

</body>
</html>
