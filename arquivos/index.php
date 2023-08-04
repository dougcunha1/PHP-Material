<?php
    // Inclui uma cópia do nosso arquivo database.php
    include("database.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
</head>
<body>
    <!-- Script PHP que previne Cross-Site Scripting utilizando o filter htmlspecialchars -->
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>Welcome to Fakebook!</h2>
        <label>Username:</label>
        <input type="text" name="username">
        <label>Password:</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>

<?php
    // Analisa para ver se o método de requisição é POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Aplica um filtro no username para previnir scripts maliciosos
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        // Checando se o username está vazio
        if (empty($username)) {
            echo "Please enter an username!";
        }
        elseif (empty($password)) {
            echo "Please enter an password!";
        }
        else {
            // Aplica um algoritmo(BCrypt) de hash no password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Query SQL que insere dados na tabela users
            $sql = "INSERT INTO users(user, password) VALUES('$username', '$hash')";

            try {
                // Aplicando a query utilizando a função mysqli_query()
                mysqli_query($conn, $sql);
                // Informa ao usuário que o mesmo se registrou com sucesso
                echo "You are now registered!";
            }
            catch (mysqli_sql_exception) {
                echo "That username is taken!";
            }
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
?>
