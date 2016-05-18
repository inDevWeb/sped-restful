<?php

namespace SpedRest\Validators;

use Prettus\Validator\LaravelValidator;

class IssuerValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:25',
        'razao' => 'required|max:255',
        'logradouro' => 'required|max:255',
        'numero' => 'required|max:50',
        'complemento' => 'required|max:255',
        'municipio' => 'required|max:255',
        'UF' => 'required|max:2',
        'cep' => 'required|max:20',
        'logo'=> '',
        'cnpj'  => 'required|min:14|max:14',
        'ie'   => 'required|max:14',
        'im' => 'max:20',
        'CNAE' => 'max:20',
        'CSC' => 'max:100',
        'CSC_id' => 'max:100',
        'IBPT' => 'max:100',
        'email' => 'required|email',
        'pass' => 'max:20',
        'smtp' => 'max:255',
        'port' => 'max:20',
        'ssl' => 'max:10',
        'fromname' => 'max:255',
        'replyto' => 'email'
    ];
}
