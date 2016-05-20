<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SpedRest\Repositories\ContingencyRepository;
use SpedRest\Entities\Contingency;
use SpedRest\Validators\ContingencyValidator;

/**
 * Class ContingencyRepositoryEloquent
 * @package namespace SpedRest\Repositories;
 */
class ContingencyRepositoryEloquent extends BaseRepository implements ContingencyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contingency::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
