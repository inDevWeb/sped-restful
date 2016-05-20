<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Issuer extends Model implements Transformable
{
    use TransformableTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fantasia',
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
    
    /**
     * Busca os usuários relacionados com o Emitente
     * @return User
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'issuer_members', 'issuer_id', 'member_id');
    }
    
    /**
     * Busca certificados do Emitente
     * @return Certificate
     */
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
    
    public function environment()
    {
        return $this->hasOne(Environment::class);
    }
    
    public function contingency()
    {
        return $this->hasOne(Contingency::class);
    }

    public function protocol()
    {
        return $this->hasOne(Protocol::class);
    }
}
