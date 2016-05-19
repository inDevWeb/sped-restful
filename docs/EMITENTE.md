# Sped-RestFul

## Gestão de Emitente (ISSUER)
Através desses serviços é possivel incluir, modificar ou remover os emitentes da aplicação.
O Emitente é uma referência a empresa emitente do SPED.
>Além dos dados do emitente também devem ser passados o certificado digital, após o emitente haver sido cadastrado com sucesso.

## Listar Emitentes
Serão retornados quantos emitentes estiverem cadastrados.
>Somente o administrador do sistema tem acesso a essa lista.

**GET:** http://dominio/issuer

Retorno de status HTTP: 200 (Success)

Retorno:

```json
    {
        "bStat": true,
  	    "users": [
  		    {
                "id": "",
    			"fantasia" : "",
    			"razao": "",
    			"logradouro": "",
    			"numero": "",
    			"complemento": "",
    			"municipio": "",
    			"UF": "",
    			"cep": "",
    			"logo": "",
    			"cnpj": "",
    			"ie": "",
    			"im": "",
    			"CNAE": "",
    			"CSC": "",
    			"CSC_id": "",
    			"IBPT": "",
    			"email": "",
    			"pass": "",
    			"smtp": "",
    			"port": "",
    			"ssl": "",
    			"fromname": "",
    			"replyto": ""
  			}
        ]
    }
```

Explicações :
- "fantasia" Refere-se a um nome fantasia da empresa, simplificado e sem espaços
- "razao" Razão Social Completa
- "logradouro" Nome do logradouro do endereço
- "numero" Numero do logradouro do endereço
- "complemento" Complemento do endereço
- "municipio" Nome do municipio 
    			"UF": "",
    			"cep": "",
    			"logo": "",
    			"cnpj": "",
    			"ie": "",
    			"im": "",
    			"CNAE": "",
    			"CSC": "",
    			"CSC_id": "",
    			"IBPT": "",
    			"email": "",
    			"pass": "",
    			"smtp": "",
    			"port": "",
    			"ssl": "",
    			"fromname": "",
    			"replyto": ""



## Cadastrar Emitentes

> O cadastro de novos emitentes somente poderá ser feito pelo próprio administrador do sistema.

**POST:** http://dominio/issuer

> Todos os parametros são considerados obrigatórios e devem existir mesmo que como uma string vazia.

Parametros:
```json
  {
    "fantasia" : "",
    "razao": "",
    "logradouro": "",
    "numero": "",
    "complemento": "",
    "municipio": "",
    "UF": "",
    "cep": "",
    "logo": "",
    "cnpj": "",
    "ie": "",
    "im": "",
    "CNAE": "",
    "CSC": "",
    "CSC_id": "",
    "IBPT": "",
    "email": "",
    "pass": "",
    "smtp": "",
    "port": "",
    "ssl": "",
    "fromname": "",
    "replyto": ""
  }
```
Retorno de status HTTP: 200 (Success)

Retorno:
```json
	{
        "bStat": true,
        "id": ""
    }
```


## Editar Emitente

> A edição dos dados do emitente poderá der feita a partir da autenticação do próprio emitente ou do administrador do sistema

$id = id do emitente

**PUT:** http://dominio/issuer/$id

> Todos os parâmetros são considerados obrigatórios e devem existir mesmo que como uma string vazia.

Parâmetros:
```json
  {
    "fantasia" : "",
    "razao": "",
    "logradouro": "",
    "numero": "",
    "complemento": "",
    "municipio": "",
    "UF": "",
    "cep": "",
    "logo": "",
    "cnpj": "",
    "ie": "",
    "im": "",
    "CNAE": "",
    "CSC": "",
    "CSC_id": "",
    "IBPT": "",
    "email": "",
    "pass": "",
    "smtp": "",
    "port": "",
    "ssl": "",
    "fromname": "",
    "replyto": ""
  }
```
Retorno de status HTTP: 200 (Success)

Retorno:
```json
    {
        "bStat": true,
        "id": ""
    }
```

## Deletar Emitente
Os emitentes poderão ser removidos pelos seus usuários vinculados, porém ao faze-lo serão apagadas todos os dados relativos a esse emitente.

**DELETE:** http://dominio/issuer/$id

Retorno de status HTTP: 200 (Success)

Retorno:
```json
    {
    	"bStat": true
    }
```
