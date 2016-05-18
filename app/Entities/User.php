<?php

namespace SpedRest\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Busca os Emitentes relacionados com o User
     * @return Issuer
     */
    public function issuers()
    {
        return $this->belongsToMany(Issuer::class, 'issuer_members', 'member_id', 'issuer_id');
    }
}
