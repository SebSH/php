<?php session_start(); 
$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

$query = 'SELECT  title, content FROM article WHERE id = :id ';
$id = strip_tags($_GET['id']);
$statement = $pdo->prepare($query);
$statement->execute(['id' => $id]);

$update = 'UPDATE article SET title = :title, content = :content WHERE id = :id';
$title = strip_tags($_POST['title']);
$content = strip_tags($_POST['content']);
$id = strip_tags($_GET['id']);
$statement1->bindParam(':title', $title);
$statement1->bindParam(':content', $content);
$statement1 = $pdo->prepare($update);
$statement1->execute(['id' => $id]);

$delete = 'DELETE * FROM article WHERE id = :id ';
$id = strip_tags($_GET['id']);
$statement2 = $pdo->prepare($delete);
$statement2->execute(['id' => $id]);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification article</title>
</head>
<body>
<?php 
while ( $data = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
<form name="modif" method="post" action="modif_article.php?id=<?php echo $data["id"]; ?>" >
    <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" >
            <tr>
                <td><label>Titre</label></td>
        <td><input type="text" name="title" value="<?php echo $data['title']?>" class="txtField"></td>
            </tr>
            <tr>
                <td><label>Corps de l'article</label></td>
                <td><textarea rows="10" cols="40" type="textarea" name="content" value="<?php echo $data['content']?>" class="txtField"></textarea></td>
            </tr>            
            <td colspan="2"><input type="submit" name="submit" value="Submit" ></td>
          </tr>
    </table>
<?php } ?>    
</body>
</html>