<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form name="insc" method="post" action="" >
    <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" >
            <tr>
                <td><label>Titre</label></td>
                <td><input type="text" name="title" class="txtField"></td>
            </tr>
            <tr>
                <td><label>Corps de l'article</label></td>
                <td><textarea rows="10" cols="40" type="textarea" name="content" class="txtField"></textarea></td>
            </tr>            
            <td colspan="2"><input type="submit" name="submit" value="Submit" ></td>
          </tr>
    </table>
</body>
</html>


<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');


if (isset($_POST['title']) && isset($_POST['content']) && isset($_SESSION['name'])) {
    
    $query = 'INSERT INTO article(tilte, content, username) VALUES (:user, :email, :username)';

    $statement = $pdo->prepare($query);
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    $username = strip_tags($_SESSION['name']);
    $statement->bindParam(':user', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':username', $username);
    $status = $statement->execute();
}

if ($status === false) {
    echo 'ECHEC';
}
else {
    header('Location: accueil.php');
}