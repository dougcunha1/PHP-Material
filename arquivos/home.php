<?php
    // Iniciando a sessão
    session_start();
?>

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
    This is the home page<br>
    <form action="home.php" method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>

<?php
    // Exibe o resultado de cada key presente no arquivo index.php
    echo $_SESSION["username"] . "<br>";
    echo $_SESSION["password"] . "<br>";

    // Caso o usuário clique no botão logout a session é destruida
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
?>
