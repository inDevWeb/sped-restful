<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use SpedRest\Entities\Contingency;
use SpedRest\Repositories\ContingencyRepository;

class ContingencyRepositoryEloquent extends BaseRepository implements ContingencyRepository
{
    public function model()
    {
        return Contingency::class;
    }
    
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
