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
    <label for="">Idade:</label>
    <input type="text" name="idade">
    <label for="">Email:</label>
    <input type="text" name="email">
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>

<?php
    // Recebe um argumento e analisa se o argumento(button) está setado.
    function filtra_input($resultado) {
        if (isset($resultado)) {
            // Armazena o resultado do input username e aplica o filtro
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            // Armazena o resultado do input idade e aplica o filtro
            $idade = filter_input(INPUT_POST, "idade", FILTER_SANITIZE_NUMBER_INT);
            // Armazena o resultado do input email e aplica o filtro
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            echo "Hello, {$username}<br>";
            echo "You are {$idade} years old!<br>";
            echo "Your email is: {$email}!<br>";
        }
    }
    // Chama a função e exibe o resultado
    filtra_input($_POST["enviar"]);
?>