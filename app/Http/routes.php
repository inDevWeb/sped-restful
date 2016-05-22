<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

//Grupo para colocar as rotas que dependem da autenticação
//será usada mais tarde depois que as rotas estiverem todas ajustadas
//e funcionais conforme estabelecido na documentação, apenas para facilitar
Route::group(['middleware' => 'oauth'], function () {
    
});

//Rotas de usuário
Route::resource('user', 'UserController', ['except' => ['create','edit']]);

//Rotas para Emitentes
Route::resource('issuer', 'IssuerController', ['except' => ['create','edit']]);
Route::group(['prefix' => 'issuer'], function () {
    //Rotas de Certificado
    Route::get('{id}/certificate', 'CertificateController@show');
    Route::post('{id}/certificate', 'CertificateController@store');
    //Rotas de ambiente
    Route::get('{id}/environment', 'EnvironmentController@show');
    Route::post('{id}/environment', 'EnvironmentController@store');
    //Rotas de protoclo SSL
    Route::get('{id}/protocol', 'ProtocolController@show');
    Route::post('{id}/protocol', 'ProtocolController@store');
    //Rotas de Contingência
    Route::get('{id}/contingency', 'ContingencyController@show');
    Route::post('{id}/contingency', 'ContingencyController@store');
    Route::delete('{id}/contingency', 'ContingencyController@destroy');
});

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
