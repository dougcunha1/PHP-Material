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

[Voltar](README.md)