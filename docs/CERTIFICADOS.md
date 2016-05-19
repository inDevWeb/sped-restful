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
    {
        "bStat": true,
        "validade": "2016-04-21",
        "timestamp": "1461207600",
        "cnpj": "99999999999999"
    }
```

## Upgrade do Certificado

> A inclusão ou renovação do certificado digital poderá ser feita apenas pelo próprio emitente.

$id = id do emitente

**POST:** http://dominio/issuer/$id/certificate

Parametros:
pfx = certificado pfx form file upload
senha = password de segurança do certificado
cadeia = cadeia de certificação do certificado digital form file upload

>O certificado pfx é **"OBRIGATÓRIO"**, bem como a **"SENHA"**, já a cadeia de certificação completa poderá ou não ser necessária para algum SEFAZ. Se não for necessária deixar o campo vazio.

Retorno de status HTTP: 200 (Success)

Retorno:
```json
	{
    	"bStat": true
    }
```



