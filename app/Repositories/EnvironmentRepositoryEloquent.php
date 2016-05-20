<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SpedRest\Repositories\EnvironmentRepository;
use SpedRest\Entities\Environment;
use SpedRest\Validators\EnvironmentValidator;

/**
 * Class EnvironmentRepositoryEloquent
 * @package namespace SpedRest\Repositories;
 */
class EnvironmentRepositoryEloquent extends BaseRepository implements EnvironmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Environment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
