# Sped-RestFul

# Segurança de acesso


## OAuth2

### Login
O login será feito com o email do usuário cadastrado e sua senha atraves da rota oauth/access_token, conforme o padrão do OAuth2.

**POST:** http://<dominio>/oauth/access_token
**BODY:**
- username............email cadastrado para o usuário
- password............senha cadastrada para o usuário
- client_id..............hash id definido na configuração OAuth2
- client_secret.......hash secret definido na configuração do OAuth2
- grant_type..........password (apenas a palavra não é para colocar senha nenhuma)

Retorno de status HTTP: 200 (Success)

Retorno:
```json
{
  "access_token": "cDtrJKaoJFxsNy6jvRaFkL7Kz3Lda41U1m7v7ldl",
  "token_type": "Bearer",
  "expires_in": 3600,
  "refresh_token": "vWFVOqRULssx9Dueof2Zmyue6pojjC9VciADqtLT"
}
```