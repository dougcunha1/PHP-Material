<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "businessdb";
    $conn = "";

    try {
        // A função mysqli_connect recebe quatro argumentos
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    }
    catch (mysqli_sql_exception) {
        echo "Could not connect!<br>";
    }
?>