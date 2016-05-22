# Sped-RestFul

## Modo de Contingência

## Contingência
Checa se está ativada a contingência

**GET:** http://dominio/issuer/$id/contingency

Retorno de status HTTP: 200

Retorno:
```json
[
  {
    "issuer_id": 1,
    "tipo": "SVC",
    "motivo": "queda de conexão",
    "hora": "2016-05-22 16:13:20",
    "created_at": "2016-05-22 16:13:20",
    "updated_at": "2016-05-22 16:13:20"
  }
]
```
>Caso retornem dados vazios então a emissão é **"normal"** e não contingência, de outra forma serão retornados os dados da contingência.


## Ativar Contingencia

Ativa o modo de contingência SVC-AN ou SVC-RS, dependendo do estado do emissor.

**POST:** http://dominio/issuer/$id/contingency

>O parametro motivo é obrigatório

Parametros:
motivo  string motivo declarado para a entrada em contigencia 

Retorno de status HTTP: 200

Retorno:
```json
{
  "tipo": "SVC",
  "motivo": "queda de conexão",
  "hora": "2016-05-22 16:13:20",
  "issuer_id": 1,
  "updated_at": "2016-05-22 16:13:20",
  "created_at": "2016-05-22 16:13:20",
  "id": 0
}
```

## Desativar Contingência
Desativa o modo de contingência SVC-AN ou SVC-RS. Para desativar o modo de contingência mantenha o campo motivo em "branco" (vazio)

**DELETE:** http://dominio/issuer/$id/contingency

Retorno de status HTTP: 200

Retorno:
```json
{
  "success": true
}
```
