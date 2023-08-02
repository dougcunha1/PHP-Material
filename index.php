<?php
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
    This is de login page<br>
    <a href="home.php">This goes to home page</a><br>

    <form action="index.php" method="POST">
        <label for="">Username:</label>
        <input type="text" name="username">
        <label for="">Password:</label>
        <input type="password" name="password">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
    if (isset($_POST["login"])) {
        // Caso o username e senha não estejam vazios, é criado uma session
        if (!empty($_POST["username"] && !empty($_POST["password"]))) {
            // Não aplicamos nenhum filtro, é apenas um exemplo
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            // Redireciona para a página home.php
            header("Location: home.php");
        }
        else {
            echo "Missing username/password<br>";
        }
    }
?>