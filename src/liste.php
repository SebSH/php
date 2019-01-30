<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$query = 'SELECT id, title, content FROM article' ;
$statement = $pdo->prepare($query);
$statement->execute();

while ( $data = $statement->fetch(PDO::FETCH_ASSOC)) {

?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des articles</title>
</head>
<body>

<table>
        <tr>
            <th>Titre</th>
        </tr>
<br>
        <tr>
            <td><?php echo $data["title"]; ?></td>           
            <td><button><a href="info.php?id=<?php echo $data["id"]; ?>">Info</a></button></td>
        </tr>

<?php } ?>
</body>
</html>
    
</body>
</html>