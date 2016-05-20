<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Busca emitentes relacionados com o usuário
     * @return Issuer
     */
    public function issuers()
    {
        return $this->belongsToMany(Issuer::class, 'issuer_members', 'member_id', 'issuer_id');
    }
}
