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
    <input type="checkbox" name="pizza" value="Pizza">Pizza<br>
    <input type="checkbox" name="hamburger" value="Hamburger">Hamburger<br>
    <input type="checkbox" name="hotdog" value="Hotdog">Hotdog<br>
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>

<?php
    if (isset($_POST["enviar"])) {
        if (isset($_POST["pizza"])) {
            echo "Você selecionou {$_POST["pizza"]}<br>";
        }
        if (isset($_POST["hamburger"])) {
            echo "Você selecionou {$_POST["hamburger"]}<br>";
        }
        if (isset($_POST["hotdog"])) {
            echo "Você selecionou {$_POST["hotdog"]}<br>";
        }

        if (empty($_POST["pizza"])) {
            echo "Você não gosta de Pizza?<br>";
        }
        if (empty($_POST["hamburger"])) {
            echo "Você não gosta de Hamburger?<br>";
        }
        if (empty($_POST["hotdog"])) {
            echo "Você não gosta de Hotdog?<br>";
        }
    }
?>