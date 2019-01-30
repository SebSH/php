<?php $pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');
$delete = 'DELETE * FROM article WHERE id = :id ';
$id = strip_tags($_GET['id']);
$statement = $pdo->prepare($delete);
$statement->execute(['id' => $id]);
header("Location:article.php");