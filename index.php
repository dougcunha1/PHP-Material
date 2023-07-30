<?php
    // Funções de strings úteis
    $nome = "Douglas Cunha";
    $telefone = "123-456-7890";

    // Deixa a string toda em maiúsculo.
    echo strtoupper($nome) . "<br>";
    // Deixa a string toda em minúsculo.
    echo strtolower($nome) . "<br>";
    // Retira os espaços a esquerda e direita da string.
    echo trim("   DOUGLAS CUNHA   ") . "<br>";
    // O primeiro parâmetro é o que queremos retirar da string
    // O segundo parâmetro é o que queremos substituir pelo primeiro parâmetro
    // O terceiro parâmetro é o valor a ser passado para substituição
    echo str_replace("-", "", $telefone) . "<br>";
    // Reverte a string
    echo strrev($nome) . "<br>";
    // Embaralha a string aleatoriamente
    echo str_shuffle($nome) . "<br>";
    // Retorna 0 caso as strings sejam iguais.
    echo strcmp($nome, "Douglas Cunha") . "<br>";
    // Retorna a quantidade de caracteres da string.
    echo strlen($nome) . "<br>";
?>