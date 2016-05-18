<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'issuer_id',
        'pfx',
        'chain',
        'secret',
        'cnpj',
        'validity'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pfx',
        'chain',
        'secret'
    ];
}
