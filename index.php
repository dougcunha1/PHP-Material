<?php
    $nome = "Douglas";
    // Retorna 1(true) pois a variável está preenchida.
    echo isset($nome);

    echo "<br>";

    $sobrenome = false;
    // Retorna nada(nesse caso é falsa).
    echo isset($sobrenome);
    // Retorna 1(true) pois a variável é null.
    echo empty($sobrenome);

    // Analisando se a variável $nome foi setada.
    if (isset($nome)) {
        echo "<br>Hello, {$nome}<br>";
    }
    else {
        echo "<br>A variável não está definida!<br>";
    }

    echo "<br>";

    // Analisando se a variável $sobrenome é falsa, null ou não foi declarada.
    if (empty($sobrenome)) {
        echo "<br>A variável é null, false ou não foi preenchida!<br>";
    }
    else {
        echo "<br>A variável foi preenchida!<br>";
    }
?>