<?php session_start();

if (isset($_POST['pseudo'])) {
    $username = strip_tags($_POST['pseudo']);
    $_SESSION['name'] = $username;
}

if (isset($_SESSION['name'])) {
    $username = $_SESSION['name'];
}

if (!empty($username)){
echo 'Bonjour ' . $username;
}

if (empty($username)){
    header('Location: index.php');
    }
?>

    <!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
<body>
	<h1>Bienvenue</h1>
	<div align="right" style="padding-bottom:5px;"><a href="inscription_article.php" class="link"> Nouvel article</a></div>
	<div align="right" style="padding-bottom:5px;"><a href="article.php" class="link"> Vos articles</a></div>
    <div align="right" style="padding-bottom:5px;"><a href="liste.php" class="link"> Liste des articles</a></div>
</body>
</html>