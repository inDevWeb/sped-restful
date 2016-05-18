# Sped-RestFul

# Configuração Inicial

## .ENV 
Na raiz do projeto copie o arquivo .env.example e modifique de acordo com sua intalação

```php
APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:WWnS8stQ3H/EDdWNM2wnlKIQldVo+01xHaxIuFNpdho=
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spedrest
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
## Tabelas da base de dados
Faça a migração das tabelas para a base de dados com

```
artisan migrate
```
Isso irá carregar as tabelas para a sua base de dados

## Seed inicial da base de dados
Para pode iniciar o usu do serviço é necessário carregar algumas tabelas com as informações iniciais do administrador e do aplicativo cliente
  
## Persistencia de dados
Os dados referentes aos usuários são mantidos em banco de dados SQL e configurados durante a instalação. (vide [Configuração](CONFIGURACAO.md))
