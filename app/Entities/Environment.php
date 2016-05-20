<?php

namespace SpedRest\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Environment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['tpAmb'];

    public function issuer()
    {
        return $this->belongsTo(Issuer::class);
    }
}
