<?php
    include("database.php");

    $sql = "SELECT * FROM users";
    // Result é basicamente um "objeto"
    $result = mysqli_query($conn, $sql);

    // A função mysqli_num_rows calcula a quantidade de linhas existentes no db
    if (mysqli_num_rows($result) > 0) {
        // A função mysqli_fetch_assoc retorna a próxima linha disponível
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["id"] . "<br>";
            echo $row["user"] . "<br>";
            echo $row["reg_date"] . "<br>";
            echo "<br>";
        }

    }
    else {
        echo "No user found!";
    }

    mysqli_close($conn);
?>