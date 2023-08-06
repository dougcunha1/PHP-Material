# Introdução ao Laravel

Antes de começarmos o tutorial, vamos falar sobre uma ferramenta chamada Composer

## Composer
Composer é um gerenciador de dependências para PHP. Podemos pensar no Composer como sendo semelhante ao NPM do Node. Ou seja, podemos instalar pacotes(bibliotecas) e outras coisas utilizando o Composer.

## Instalando o Composer no Linux

Para instalar o composer basta acessar a [documentação oficial](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) ou instalar utilizando o [homebrew](https://formulae.brew.sh/formula/composer#default). Caso tenha dificuldades, basta seguir o tutorial da [DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04).

## Usando Composer

O comando **composer require package_name** realiza o download o pacote.

```php
composer require cocur/slugify
```

No exemplo acima, todos os arquivos que preciamos estar no diretório vendor.

Abaixo fazemos a "importação" do arquivo autoload.php no nosso arquivo index.php. Já a linha **use Cocur\Slugify\Slugify;** funciona como o import ou require do NodeJS. 
```php
<?php

require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;

?>
```

Abaixo criamos uma instância da classe Slufigy e utilizamos o método slugify("The sky is blue, and the grass is green!");

```php
<?php

require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;

$slugify = new Slugify();
// O resultado é dado por:
// the-sky-is-blue-and-the-grass-is-green
echo $slugify->slugify("The sky is blue, and the grass is green!");

?>
```

## Instalando o framework Laravel utilizando Composer

O código abaixo faz uso do Composer, em seguida utilizamos as palavras reservadas **create-project** seguido do pacote que queremos instalar, nesse caso **laravel/laravel** e por fim adicionamos um ponto no final, isso indica que o pacote será instalado no diretório atual.

```php
composer create-project laravel/laravel .
```

Para rodar um servidor local basta utilizar o Artisan

```php
php artisan serve
```

O comando acima vai abrir um servidor local com o url e a porta por padrão.

```txt
INFO  Server running on [http://127.0.0.1:8000].  
```

## Introdução aos diretório do projeto e a blade template engine

No diretório **resources/views/welcome.blade.php** é armazenado a página inicial quando rodamos o artisan serve, nesse caso o laravel faz uso do template engine Blade. 

Já o diretório **routes/web.php** é onde fica os nossos routes, ou seja, o lugar onde armazena o roteamento das páginas quando tentamos acessar determinado URL.

Foi substituido o arquivo welcome.blade.php por um arquivo chamado **home.blade.php** no diretório **resources/views**

Dentro do arquivo **home.blade.php** foi adicionado o seguinte código

```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        // /register basicamente é o URL no qual o usuário será redirecionado
        <form action="/register" method="POST">
            <label>Username:</label>
            <input type="text" name="name">
            <label>Email:</label>
            <input type="text" name="email">
            <label>Password:</label>
            <input type="password" name="password">
            <button>Register</button>
        </form>
    </div>
</body>
</html>

```

Acessando o diretório **routes/web.php** e criando um **router** temos

```php
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Primeiro parâmetro = o URL e segundo é uma função que é executada
// sempre que o URL é acessado.
Route::post('/register', function () {
    return 'Thank you!';
});

```

No entanto, quando clicarmos em Register será gerado um erro **419 - PAGE EXPIRED**, isso se deve a um problema envolvendo **CSRF**, para saber mais [clique aqui](https://www.ibm.com/docs/pt-br/sva/10.0.0?topic=configuration-prevention-cross-site-request-forgery-csrf-attacks)

Para se livrar do problema envolvendo **CSRF** basta ir no nosso arquivo **home.blade.php** e adicionar **@csrf** dentro do **form** e o problema será resolvido.

```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            <!-- Resolve CSRF problem. -->
            @csrf
            <label>Username:</label>
            <input type="text" name="name">
            <label>Email:</label>
            <input type="text" name="email">
            <label>Password:</label>
            <input type="password" name="password">
            <button>Register</button>
        </form>
    </div>
</body>
</html>
```

## Trabalhando com Controllers



[Voltar](README.md)