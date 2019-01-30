<?php
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$query = 'SELECT  title, content, body FROM article JOIN commentaire ON id.article = article.commentaire WHERE id = :id ';
$id = strip_tags($_GET['id']);
$statement = $pdo->prepare($query);
$statement->execute(['id' => $id]);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
while ( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    
 ?>
<table border="0">
        <tr>
            <td>Titre</td>
            <td>Corps de l'article</td>
            <td>Commentaires</td>
        </tr>
<br>
        <tr>
            <td><?php echo $data["title"]; ?></td>
            <hr>
            <td><?php echo $data["content"]; ?></td>
            <hr>
            <td><?php echo $data["body"]; ?></td>
            <hr>
            <td><button><a href="commentaire.php?id=<?php echo $data["id"]; ?>">Commenter</a></button></td>
        </tr>

<?php } ?>
</body>
</html>