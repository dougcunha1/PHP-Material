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
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
    <label for="">Username:</label>
    <input type="text" name="username">
    <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>

<?php
    foreach ($_SERVER as $key => $value) {
        echo "Key: {$key}<br>Value: {$value}<br>";
    }

    // Analisas se o método de requisição é igual a POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Hello!";
    }
?>