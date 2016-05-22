<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use SpedRest\Entities\Protocol;
use SpedRest\Repositories\ProtocolRepository;

class ProtocolRepositoryEloquent extends BaseRepository implements ProtocolRepository
{
    public function model()
    {
        return Protocol::class;
    }
    
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
