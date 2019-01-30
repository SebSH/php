<?php session_start();
if (isset($_SESSION['id']) == null) {
    header('Location: index.php');
}

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$query = 'SELECT id, title, content FROM article WHERE username = :username' ;
$id = strip_tags($_SESSION['id']);
$statement->bindParam(':username', $id);
$statement = $pdo->prepare($query);
$statement->execute();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
while ( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    
 ?>
<table>
        <tr>
            <th>Titre</th>
        </tr>
<br>
        <tr>
            <td><?php echo $data["title"]; ?></td>           
            <td><button><a href="info.php?id=<?php echo $data["id"]; ?>">Info</a></button></td>
            <td><button><a href="modif_article.php?id=<?php echo $data["id"]; ?>">Modifier</a></button></td>
            <td><button><a href="suppr_article.php?id=<?php echo $data["id"]; ?>">Supprimer</a></button></td>
        </tr>

<?php } ?>
</body>
</html>