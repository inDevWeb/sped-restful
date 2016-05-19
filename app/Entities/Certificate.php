<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Certificate extends Model implements Transformable
{
    use TransformableTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pfx',
        'chain',
        'secret',
        'prikey',
        'pubkey',
        'certkey',
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
        'secret',
        'prikey',
        'pubkey',
        'certkey'
    ];
    
    public function issuer()
    {
        return $this->belongsTo(Issuer::class);
    }
}
