<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');

if(isset($_POST['name'], $_POST['password'])){
$query = 'SELECT name, password FROM users WHERE name = :name  AND password = :password';
$name = strip_tags($_POST['name']);
$password = strip_tags($_POST['password']);
$statement = $pdo->prepare($query);
$statement->bindParam(':name', $password);
$statement->bindParam(':password', $password);
$status = $statement->execute();
}

while ( $data = $statement->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['name'] = $_POST['name'];
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form name="conn" method="post" action="" >
    <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" >
            <tr>
                <td><label>Nom</label></td>
                <td><input type="text" name="name" class="txtField"></td>
            </tr>
            <tr>
                <td><label>Mot de Passe</label></td>
                <td><input type="password" name="password" class="txtField"></td>
            </tr>
            <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit" ></td>
          </tr>
    </table>
</body>
</html>