# Material de estudo da linguagem PHP

## Para iniciar um servidor PHP basta utilizar o comando

```php
php -S localhost:8000
```

## Variáveis em PHP

Para declarar variáveis em PHP devemos utilizar o caractere $ antes do nome da variável.

```php
<?php
    // String
    $nome = "Douglas";
    echo "Hello, {$nome}!";
    // Integer
    $idade = 23;
    echo "You are {$idade} years old!";
    // Float
    $peso = 65.5;
    echo "Your weight is {$peso}kg!";
?>
```

## Variáveis especiais $_GET e $_POST

São variáveis especiais responsáveis por coletar dados de formulários HTML.

- $_GET
   - Os dados são exibidos na URL.
   - Não é seguro.
   - Tem limite de caracteres.
   - Melhor utilizado para páginas de pesquisa.
- $_POST
  - Os dados são agrupados dentro do corpo da requisição HTTP.
  - É mais seguro.
  - Não possui limite de dados.
  - Melhor utilizado para dados sensíveis.

Os métodos $_GET e $_POST são variáveis especiais pois podem armazenar mais de um valor. Além disso, eles "podem ser consideardos um array"

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <label for="">Username:</label>
        <input type="text" name="username">
        <label for="">Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Log in">
    </form>
</body>
</html>

<?php
    // Note que utilizamos [] para acessar o atrbiuto username e password
    echo "{$_GET["username"]} <br>";
    echo "{$_GET["password"]}";
?>
```

O exemplo acima gera um problema ao ser utilizado com $_GET, pois o valor será atribuido na URL: **http://localhost/dev/index.php?username=Teste&password=teste123** ou seja, não há segurança.

Utilizando $_POST temos segurança, pois os dados são agrupados dentro do corpo da requisição HTTP.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="">Username:</label>
        <input type="text" name="username">
        <label for="">Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Log in">
    </form>
</body>
</html>

<?php
    // Note que utilizamos [] para acessar o atrbiuto username e password
    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]}";
?>
```

Dessa forma quando o username e password forem enviados, temos que não serão exibidos na URL.

### Exemplo de programa que cálcula o IMC de uma pessoa e exibe o resultado

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="">Nome:</label>
        <input type="text" name="nome"><br>
        <label for="">Idade:</label>
        <input type="number" name="idade"><br>
        <label for="">Peso:</label>
        <input type="decimal" name="peso"><br>
        <label for="">Altura:</label>
        <input type="decimal" name="altura"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    echo "{$_POST["nome"]}<br>";
    echo "{$_POST["idade"]}<br>";
    echo "{$_POST["peso"]}<br>";
    echo "{$_POST["altura"]}<br>";
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    
    // Lidando com o problema da divisão por 0
    if ($altura <= 0) {
        echo "Altura inválida.";
    }
    else {
        // Realiza o cálculo do IMC.
        $imc_pessoa = round($peso / ($altura * $altura), 2);
        // Analisa o perfil do usuário.
        if ($imc_pessoa >= 0 && $imc_pessoa <= 18.5) {
            echo "O seu IMC é: {$imc_pessoa} e você está abaixo do peso.";
        }
        elseif ($imc_pessoa > 18.5 && $imc_pessoa <= 24.9) {
            echo "O seu IMC é: {$imc_pessoa} e você está com o peso ideal.";
        }
        elseif ($imc_pessoa > 24.9 && $imc_pessoa <= 29.9) {
            echo "O seu IMC é: {$imc_pessoa} e você está acima do peso.";
        }
        elseif ($imc_pessoa > 29.9 && $imc_pessoa <= 34.9) {
            echo "O seu IMC é: {$imc_pessoa} e você está com obesidade grau 1.";
        }
        elseif ($imc_pessoa > 34.9 && $imc_pessoa <= 39.9) {
            echo "O seu IMC é: {$imc_pessoa} e você está com obesidade grau 2(severa).";
        }
        elseif ($imc_pessoa >= 40) {
            echo "O seu IMC é: {$imc_pessoa} e você está com obesidade grau 3(mórbida).";
        }
        else {
            echo "IMC inválido.";
        }
    }
?>
```

## Loops em PHP

No exemplo abaixo foram utilizados for e while loop.

````php
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
````

## Arrays em PHP

````php
<?php
    // Array de strings
    $comidas = array("Maçã", "Banana", "Laranja");
    echo $comidas;
?>
````

### Percorrendo um array utilizando foreach

````php
<?php
    // Array de strings
    $comidas = array("Melância", "Maçã", "Banana", "Laranja");

    // A função array_push(nome_array, valor) adiciona um valor no final do array
    array_push($comidas, "Caju");

    // A função array_pop(nome_array) remove o último elemento do array
    array_pop($comidas);

    // A função array_shift(nome_array) remove o primeiro elemento do array
    array_shift($comidas);

    // A função array_reverse(nome_array) reverte a ordem do array e retorna um novo array
    $comidas_contrario = array_reverse($comidas);
    
    foreach ($comidas_contrario as $comida) {
        echo $comida . "<br>";
    }

    // A função count(nome_array) retorna o número de elementos do array
    echo "Total de comidas: " . count($comidas) . "<br>"
?>
````

## Arrays associativos 

Um array associativo é um array composto por key-value(chave-valor), ou seja, para cada key há um valor específico.

```php
<?php
    $capitais = array("Japão" => "Tóquio",
        "Coreia do Sul" => "Seoul",
        "EUA" => "Washington D.C",
        "India" => "Nova Delhi");

    // Acessando o valor da chave individualmente
    // echo $capitais["Japão"];

    // Exibindo todos os valores chave-valor com foreach
    foreach ($capitais as $chave => $valor) {
        echo "País: {$chave} <br>Capital: {$valor}<br><br>";
    }
?>
```

Funções envolvendo arrays associativos:

```php
<?php
    $capitais = array("Japão" => "Tóquio",
        "Coreia do Sul" => "Seoul",
        "EUA" => "Washington D.C",
        "India" => "Nova Delhi");

    // Acessando o valor da chave individualmente
    // echo $capitais["Japão"];

    // Remove o ultimo par(chave-valor)
    array_pop($capitais);

    // Remove o primeiro par(chave-valor)
    array_shift($capitais);

    // A função array_keys gera um novo array só de chaves.
    $chaves = array_keys($capitais);

    foreach ($chaves as $chave) {
        echo $chave . "<br>";
    }

    echo "<br>";

    // A função array_values gera um novo array só de valores.
    $valores = array_values($capitais);

    foreach ($valores as $valor) {
        echo $valor . "<br>";
    }

    echo "<br>";

    // Exibindo todos os valores chave-valor com foreach
    foreach ($capitais as $chave => $valor) {
        echo "País: {$chave} <br>Capital: {$valor}<br><br>";
    }

    // A função array_flip inverte a ordem de exibição do par chave-valor
    $chave_valor_invertido = array_flip($capitais);

    foreach ($chave_valor_invertido as $chave => $valor) {
        echo "{$chave} = {$valor}<br>";
    }

    // A função array_reverse gera um novo array com os elementos invertidos
    $capitais = array_reverse($capitais);
    echo "<br>";
    foreach ($capitais as $chave => $valor) {
        echo "{$chave} = {$valor}<br>";
    }

    // A função count retorna a quantidade de pares associados(chave-valor)
    echo "<br>Total de pares associados: " . count($capitais) . "<br>";
?>
```

Exemplo de programa que ao passar o nome de um país como input retorna o nome da sua capital:

```php
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
<form action="index.php" method="POST">
    <label for="">País:</label>
    <input type="text" name="pais">
    <input type="submit" value="Enviar">
</form>
</body>
</html>

<?php
    $capitais = array("Japão" => "Tóquio",
        "Coreia do Sul" => "Seoul",
        "EUA" => "Washington D.C",
        "India" => "Nova Delhi");

    // Armazena o resultado do input com atributo pais
    $pais = $_POST["pais"];
    // Exibe o resultado
    echo "Pais: {$pais}<br>" . "Capital: {$capitais["$pais"]}<br>";
?>
```

## Funções isset() e empty()

A função isset() retorna TRUE caso a variável seja declarada e não seja null.

A função empty() retorna TRUE caso a variável não seja declarada, seja falsa ou null.

```php
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
```