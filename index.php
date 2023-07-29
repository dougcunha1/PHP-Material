<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="">Digite um número:</label>
        <input type="number" name="numero"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    // Armazena o valor do campo numero
    $contador = $_POST["numero"];
    $rodando = false;
    // Exibe o resultado
    for ($i = 1; $i <= $contador; $i++) {
        echo $i . "<br>";

        if ($i == $contador) {
            $rodando = true;
        }
    }

    // Exemplo com while loop
    $num = 10;

    echo "<br>";

    if ($rodando) {
        while ($num > 0) {
            echo $num . "<br>";
            $num--;
        }
    }
?>