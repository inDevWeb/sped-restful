<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

//Rotas de usuário
Route::get('user', 'UserController@index');
Route::post('user', 'UserController@store');
Route::get('user/{id}', 'UserController@show');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@destroy');

//Rotas para Emitentes
Route::get('issuer', 'IssuerController@index');
Route::post('issuer', 'IssuerController@store');
Route::get('issuer/{id}', 'IssuerController@show');
Route::put('issuer/{id}', 'IssuerController@update');
Route::delete('issuer/{id}', 'IssuerController@destroy');

//Rotas de Certificado
Route::get('issuer/{id}/certificate', 'CertificateController@show');
Route::post('issuer/{id}/certificate', 'CertificateController@store');


//Rotas de ambiente
Route::get('issuer/{id}/environment', 'EnvironmentController@show');
Route::post('issuer/{id}/environment', 'EnvironmentController@store');

//Rotas de protoclo SSL
Route::get('issuer/{id}/protocol', 'ProtocolController@show');
Route::post('issuer/{id}/protocol', 'ProtocolController@store');

//Rotas de Contingência
Route::get('issuer/{id}/contingency', 'ContingencyController@show');
Route::post('issuer/{id}/contingency', 'ContingencyController@store');
Route::delete('issuer/{id}/contingency', 'ContingencyController@destroy');

/*

//Rotas referentes a NFe
Route::post('issuer/{id}/nfe', 'NFeController@index');

//Rotas referentes a NFe por dados brutos
Route::post('issuer/{id}/nfe', 'NFeController@store');
Route::put('issuer/{id}/nfe/{num}', 'NFeController@update');
Route::delete('issuer/{id}/nfe/{num}', 'NFeController@destroy');

//Rotas referentes a NFe por dados envio do TXT
Route::post('issuer/{id}/nfetxt', 'NFeTxtController@store');
Route::delete('issuer/{id}/nfetxt/{num}', 'NFeTxtController@destroy');

//Rotas referentes a NFe por dados envio do XML
Route::post('issuer/{id}/nfexml', 'NFeXmlController@store');
Route::delete('issuer/{id}/nfexml/{num}', 'NFeXmlController@store');

//Rotas referentes a operações da NFe com a SEFAZ autorizadora
Route::get('issuer/{id}/nfe/sefaz', 'SefazController@status');
Route::post('issuer/{id}/nfe/sefaz/cadastro', 'SefazController@show');
Route::post('issuer/{id}/nfe/sefaz/envio', 'SefazController@sendlote');
Route::post('issuer/{id}/nfe/sefaz/recibo', 'SefazController@recibo');
Route::post('issuer/{id}/nfe/sefaz/chave', 'SefazController@chave');
Route::post('issuer/{id}/nfe/sefaz/cancela', 'SefazController@cancela');
Route::post('issuer/{id}/nfe/sefaz/inutiliza', 'SefazController@inutiliza');
Route::post('issuer/{id}/nfe/sefaz/cce', 'SefazController@cce');

//Rotas referentes a emissão de documentos auxiliares
Route::post('issuer/{id}/nfe/danfe/{num}', 'DaController@danfe');
*/
