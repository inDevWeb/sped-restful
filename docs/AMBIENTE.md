# Sped-RestFul

## Gestão de Ambiente Operacional
Neste bloco estão contidos os métodos necessários para a gestão das condições operacionais do sistema.

## Ambiente
Retorna qual o ambiente que está ativo no sistema

**GET:** http://dominio/issuer/$id/environment
Retorno de status HTTP: 200

Retorno:
```json
[
  {
    "issuer_id": 1,
    "tpAmb": 1,
    "description": "producao",
    "created_at": "2016-05-22 15:20:48",
    "updated_at": "2016-05-22 15:20:48"
  }
]
```

##Editar Ambiente
Especifica em qual ambiente o aplicativo deve operar.

>**ATENÇÃO:**
>Cuidado ao editar ou modificar o ambiente, pois os dados enviados ao embiente de produção e aceitos terão validade fiscal.

**POST:** http://dominio/issuer/$id/environment
tpAmb = tipo de ambiente 1-produção ou 2-homologação
>Se nenhum dado for passado o comando será ignorado.

Parametros:
tpAmb string 

Retorno de status HTTP: 200

Retorno:
```json
{
  "tpAmb": "2",
  "description": "homologacao",
  "issuer_id": 1,
  "updated_at": "2016-05-22 17:28:11",
  "created_at": "2016-05-22 17:28:11",
  "id": 0
}
```



## Modelo de NFe
Retorna o modelo base setado no sistema.
>Existem dois modelos possiveis para NFe o modelo "55", para NFe, e o modelo "65", para NFCe.

**GET:** http://dominio/restnfe/emitente/$id/modelo

Retorno de status HTTP: 200

Retorno:
```json
    {
      "bStat": true,
      "modelo": "55"
    }
```
>O modelo indicado por esse método é apenas um indicativo referente à maior quantidade de operações. Mas de forma operar da aplicação é "inteligente" o suficiente para tratar cada caso, sejam do modelo "55" ou do modelo "65" direcionando todas as operações aos webservices corretos.

## Editar Modelo de NFe

**POST:** http://dominio/restnfe/emitente/$id/modelo
Parametros:
```json
  {
    "modelo" : "55"
  }
```

Retorno de status HTTP: 200

Retorno:
```json
    {
      "bStat": true,
      "modelo": "55"
    }
```

