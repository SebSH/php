<?php
session_start();
if (isset($_SESSION['name'])) {
	header('Location: accueil.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
<body>
	<h1>Bienvenue</h1>
	<div align="right" style="padding-bottom:5px;"><a href="connexion.php" class="link"> Connexion</a></div>
	<div align="right" style="padding-bottom:5px;"><a href="inscription_user.php" class="link"> Inscription</a></div>
	<div align="right" style="padding-bottom:5px;"><a href="liste.php" class="link"> Liste des articles</a></div>
</body>
</html>