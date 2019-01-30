<?php $pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');
$query = 'INSERT INTO commentaire(username, body, article) VALUES(:username, :body, :article) ';
$statement = $pdo->prepare($query);
$username = strip_tags($_SESSION['username']);
$body = strip_tags($_POST['body']);
$article = strip_tags($_GET['id']);
$statement->bindParam(':username', $username);
$statement->bindParam(':body', $body);
$statement->bindParam(':article', $article);
$statement->execute();
header("Location:info.php");
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form name="insc" method="post" action="commentaire.php?id=<?php echo $data["id"]; ?>" >
    <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" >
            <tr>
                <td><label>Texte</label></td>
                <td><textarea rows="10" cols="40" type="textarea" name="body" class="txtField"></textarea></td>
            </tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit" ></td>
          </tr>
    </table>
</body>
</html>