# Sped-RestFul

## Gestão de Certificados Digitais A1

Os certificados digitais são vinculados a um único Emitiente. Somente um certificado está disponivel para cada Emitente.

Os certificados são mantidos apenas em base de dados e salvos em pasta protegida apenas temporáriamente para uso dos sistemas internos que não podem acessa-los de forma direta. E assim que forem utilizados são removidos do arquivo.

Ao subir um certificado o mesmo deverá estar no formato pfx e será validado pelo sistema. Se não pertencer ao CNPJ do emitente ou se estiver vencido o mesmo será descartado e uma mensagem de erro será retornada.

Os certificados poderão apenas ser consultados ou enviados e nunca deletados ou alterados, então exitem apenas duas operações possíveis.


## Dados do Certificado

> Os dados referentes ao certificado digital atual, poderão ser obtidos pelo próprio emitente ou pelo administrador apenas.

**GET:** http://dominio/issuer/$id/certificate

$id = id do emitente

Retorno de status HTTP: 200 (Success)

Retorno:
```json
[
  {
    "issuer_id": 1,
    "cnpj": "99999999999999",
    "validity": "2016-04-28 00:00:00",
    "created_at": "2016-05-22 17:12:32",
    "updated_at": "2016-05-22 17:12:32"
  }
]
```

## Upgrade do Certificado

> A inclusão ou renovação do certificado digital poderá ser feita apenas pelo próprio emitente.

$id = id do emitente

**POST:** http://dominio/issuer/$id/certificate

Parametros:
pfx   tipo file certificado pfx
chain tipo file cadeia de certificados
senha  string password de segurança do certificado

>O certificado pfx é **"OBRIGATÓRIO"**, bem como a **"SENHA"**, já a cadeia de certificação completa poderá ou não ser necessária para algum SEFAZ. Se não for necessária deixar o campo vazio.

Retorno de status HTTP: 200 (Success)

Retorno:
```json
[
  {
    "cnpj": "99999999999999",
    "validity": "2016-04-28 00:00:00",
    "issuer_id": 1,
    "updated_at": "2016-05-22 17:12:32",
    "created_at": "2016-05-22 17:12:32",
    "id": 0
  }
]
```

## Banco de dados 

Na base de dados é mantida uma tabela para a gestão dos certificados
TABLE certificates
    FIELDS
        issuer_id  integer unsigned
        pfx        text conteudo do arquivo pfx convertido para base64
        chain      text conteudo do arquivo chain  
        secret     string senha de acesso ao pfx
        prikey     text chave privada em formato PEM
        pubkey     text chave publica em formato PEM
        certkey    text certificados chave publica e cadeia de certificação
        cnpj       string CNPJ contido no certificado
        validity   datetime Data de validade do certificado
        create_at  datetime
        update_at  datetime
    FOREIGN KEY
           TABLE issuers FIELD id
