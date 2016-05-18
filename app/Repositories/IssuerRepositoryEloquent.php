<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use SpedRest\Entities\Issuer;
use SpedRest\Repositories\IssuerRepository;

class IssuerRepositoryEloquent extends BaseRepository implements IssuerRepository
{
    public function model()
    {
        return Issuer::class;
    }
}
