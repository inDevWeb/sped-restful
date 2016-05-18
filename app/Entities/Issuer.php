<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'razao',
        'logradouro',
        'numero',
        'complemento',
        'municipio',
        'UF',
        'cep',
        'logo',
        'cnpj',
        'ie',
        'im',
        'CNAE',
        'CSC',
        'CSC_id',
        'IBPT',
        'email',
        'pass',
        'smtp',
        'port',
        'ssl',
        'fromname',
        'replyto'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass',
        'CSC',
        'CSC_id',
        'IBPT'
    ];
}
