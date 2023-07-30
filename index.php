<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    <label for="">Username:</label>
    <input type="text" name="username">
    <label for="">Password:</label>
    <input type="password" name="password">
    <input type="submit" name="login" value="Enviar">
</form>
</body>
</html>


<?php
    // A variável global $_POST é um array associativo que contém
    // chave-valor dos elementos do form.
    foreach ($_POST as $chave => $valor) {
        echo "{$chave} = {$valor}<br>";
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username)) {
            echo "Preencha o seu username!<br>";
        }
        elseif (empty($password)) {
            echo "Preencha o seu password!<br>";
        }
        else {
            echo "Login realizado com sucesso!<br>";
            echo "Seja bem vindo(a), {$username}!<br>";
        }
    }
?>