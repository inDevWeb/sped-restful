# Sped-RestFul

Esta aplicação é construida com base no framework Larvel 5.2.

# Instalação

A instalação pode ser feita pelo git:
```bash
git clone git@github.com:nfephp-org/sped-restful.git <nome da pasta>
```
Após o Git ter instalado criado a pasta e baixado os arquivos, vá para a pasta criada.
```bash
cd <nome da pasta>
```
E instale todas as dependências com o composer:
```bash
composer install
```

## Pré-Requisitos
- PHP 5.6 ou maior
- php-curl
- php-gd
- php-mcrypt
- php-mbstring
- php-xml

## Dependências

Todas as dependências estão disponíveis no [Packgist](https://packagist.org/), e inclusas no arquivo composer.json

### Produção
- "laravel/framework": "5.2.*"
- "prettus/l5-repository": "^2.5"
- "prettus/laravel-validation": "1.1.*"
- "lucadegasperi/oauth2-server-laravel": "5.1.*"
- "daylerees/sanitizer": "^1.0"
- "canducci/zipcode": "1.*"
- "phpbu/phpbu-laravel": "^2.0"
- "nfephp-org/sped-common" : "^4.1"
- outras ainda não definidas

### Desenvolvimento
- "fzaninotto/faker": "~1.4",
- "mockery/mockery": "0.9.*",
- "phpunit/phpunit": "~4.0",
- "symfony/css-selector": "2.8.*|3.0.*",
- "symfony/dom-crawler": "2.8.*|3.0.*",
- "scrutinizer/ocular": "~1.1",
- "squizlabs/php_codesniffer": "~2.3"
