# Sped-RestFul

## Modo de protocolo para comunicação SSL via cURL
Cada emitente se comunica com um UNICO autorizador. Esse autorizador pode utilizar vários protocolos SSL diferentes.
Normalmente o PHP consegue sozinho identificar o protocolo correto, mas as vezes devido a falhas na configuração do webservices ou a BUGs na verção do cURL ou do OpenSSL o PHP fica impossibilitado de sozinho identificar qual protocolo deve usar, e nesse caso um erro será retornado.
Para contornar esse problema pode ser forçado o uso de um determinado protocolo de comunicação dentre os seguintes:
- default
- TLSv1
- SSLv2
- SSLv3
- TLSv1.0
- TLSv1.1
- TLSv1.2

Isso fará com que as comunicações com o autorizador observem o protocolo escolhido.

## Protocolo SSL
Este método retorna o protocolo setado para uso na comunicação SOAP

**GET:** http://dominio/issuer/$id/protocol

Retorno de status HTTP: 200

Retorno:
```json
[
  {
    "issuer_id": 1,
    "protocol": "sslv3",
    "created_at": "2016-05-21 00:00:00",
    "updated_at": "2016-05-21 00:00:00"
  }
]
```

## Editar Protocolo SSL
Este método força o uso de um determinado protocolo de criptografia "https"
>Algumas vezes ocorre do servidor estar "mal configurado" ou por problemas durante o "handshake" entre o cliente cURL e o servidor. E devido a isso o PHP não consegue identificar qual é o protocolo a ser usado naquele caso e de forma automática.
>Então é necessário **FORÇAR** um determinado protocolo para que a operação seja realizada.

**POST:** http://dominio/issuer/$id/protocol
Parametros:
protocol string

Retorno de status HTTP: 200

Retorno:
```json
{
  "protocol": "default",
  "issuer_id": 1,
  "updated_at": "2016-05-22 15:26:00",
  "created_at": "2016-05-22 15:26:00",
  "id": 0
}
```
