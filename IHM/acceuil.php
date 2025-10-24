<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php");
    exit();
}
include __DIR__ . '/public/header.php';
include __DIR__ . '/public/nav_barre.php';
?>
<div class="card">
    <h1>Tableau de bord</h1>
    <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['user_email']); ?> 👋</p>
    <ul>
        <li><a href="/IHM/Etudiant/affichage.php">Gérer les étudiants</a></li>
        <li><a href="/IHM/Prof/affichage.php">Gérer les professeurs</a></li>
    </ul>
</div>
<?php
include __DIR__ . '/public/footer.php';
?>