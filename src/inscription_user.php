<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form name="insc" method="post" action="" >
    <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" >
            <tr>
                <td><label>Nom</label></td>
                <td><input type="text" name="name" class="txtField"></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" name="email" class="txtField"></td>
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


<?php

$pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!');


if (isset($_POST['name']) && isset($_POST['email'])) {
    
    $query = 'INSERT INTO users(name, email, password) VALUES (:user, :email, :password)';

    $statement = $pdo->prepare($query);
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $statement->bindParam(':user', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $status = $statement->execute();
}

if ($status === false) {
    echo 'ECHEC';
}
else {
    header('Location: index.php');
}
