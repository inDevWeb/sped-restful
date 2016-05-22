<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use SpedRest\Entities\Environment;
use SpedRest\Repositories\EnvironmentRepository;

class EnvironmentRepositoryEloquent extends BaseRepository implements EnvironmentRepository
{
    public function model()
    {
        return Environment::class;
    }
    
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
