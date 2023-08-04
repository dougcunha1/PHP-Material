<?php
    include("database.php");

    // Duas variáveis quaisquer
    $username = "Douglas";
    $password = "universe123";
    // Aplicando uma hash na senha utilizando o algoritmo bcrypt
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Query simplse que seleciona a tabela users e insere dados
    $sql = "INSERT INTO users(user, password) VALUES('$username', '$hash')";

    try {
        // A função mysqli_query recebe dois parâmetros, uma conexão com o db e uma query
        mysqli_query($conn, $sql);
        echo "User is now registered!";
    }
    catch (mysqli_sql_exception) {
        echo "Could not register user!";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
?>