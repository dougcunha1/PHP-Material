<?php
    // Hashing = Transforma os dados sensíveis(ex: password) em letras, numros e/ou símbolos via
    // proceesso matemático(é um processo similar a criptografia). Basicamente esconde os dados originais
    // de terceiros.
    $password = "pizza123";
    // A função password_hash recebe uma senha e um algoritmo de hashing
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // A função password_verify analisa s um input(senha) é igual a hash passada
    if (password_verify("pizza123", $hash)) {
        echo "You are logged in!";
    }
    else {
        echo "Incorrent password!";
    }
?>