<?php
    // Cookies são armazenados em arrays associativos
    // onde arg1 é a chave(key) e arg2 é o valor(value) e arg3
    // é o tempo até essas inforamções expirar, nesse caso time() = hora agora +
    // 86400 segundos que é um dia. Por fim arg4 é o file path(caminh)
    // onde o caminho será o caminho padrão.
    setcookie("fav_food", "Pizza", time() + 86400, "/");

    // Cria um novo cookie para fav_drink com expiração de dois dias
    setcookie("fav_drink", "Capirinha", time() + (86400 * 2), "/");

    // Usando o foreach para percorrer todos os valores dos cookies
    // Para acessar os cookies basta utilizar a variável global $_COOKIE
    foreach ($_COOKIE as $key => $value) {
        echo "Key: {$key}<br>" . "Value: {$value}<br>";
}
?>