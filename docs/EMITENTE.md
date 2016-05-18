# Sped-RestFul

## Gestão de Emitente (ISSUER)
Através desses serviços é possivel incluir, modificar ou remover os emitentes da aplicação.
O Emitente é uma referência a empresa emitente do SPED.
>Além dos dados do emitente também devem ser passados o certificado digital, após o emitente haver sido cadastrado com sucesso.

## Listar Emitentes
Serão retornados quantos emitentes estiverem cadastrados.
>Somente o administrador do sistema tem acesso a essa lista.

**GET:** http://<dominio>/issuer

Retorno de status HTTP: 200 (Success)

Retorno:

```json
    {
        "bStat": true,
  	    "users": [
  		    {
                "id": "",
    			"name" : "",
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
- "name" Refere-se a um nome fantasia da empresa, simplificado e sem espaços
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

**POST:** http://<dominio>/issuer

> Todos os parametros são considerados obrigatórios e devem existir mesmo que como uma string vazia.

Parametros:
```json
  {
    "nome" : "",
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

**PUT:** http://<dominio>/issuer/$id

> Todos os parâmetros são considerados obrigatórios e devem existir mesmo que como uma string vazia.

Parâmetros:
```json
  {
    "nome" : "",
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

> A remoção do emitente somente poderá ser feita com a autenticação do administrador do sistema.

**DELETE:** http://dominio/restnfe/emitente/$id

Retorno de status HTTP: 200 (Success)

Retorno:
```json
    {
    	"bStat": true
    }
```

## Dados do Certificado

> Os dados referentes ao certificado digital atual, poderão ser obtidos pelo próprio emitente ou pelo administrador apenas.

**GET:** http://<dominio>/certificate

$id = id do emitente

Retorno de status HTTP: 200 (Success)

Retorno:
```json
    {
        "bStat": true,
        "validade": "2016-04-21",
        "timestamp": "1461207600",
        "cnpj": "99999999999999"
    }
```

## Upgrade do Certificado

> A inclusão ou renovação do certificado digital poderá ser feita apenas pelo próprio emitente ou pelo administrador.

$id = id do emitente

**POST:** http://<dominio>/certificate

Parametros:

pfx = certificado pfx comprimido com gzip e convertido para base64

senha = password de segurança do certificado

cadeia = cadeia de certificação do certificado digital, comprimido com gzip e convertido para base64

>O certificado pfx é **"OBRIGATÓRIO"**, bem como a **"SENHA"**, já a cadeia de certificação completa poderá ou não ser necessária para algum SEFAZ. Se não for necessária deixar string vazia.

```json
    {
        "pfx": "",
    	"senha": "",
        "cadeia": ""
    }
```
Retorno de status HTTP: 200 (Success)

Retorno:
```json
	{
    	"bStat": true
    }
```



