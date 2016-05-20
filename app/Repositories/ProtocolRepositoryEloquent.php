<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SpedRest\Repositories\ProtocolRepository;
use SpedRest\Entities\Protocol;
use SpedRest\Validators\ProtocolValidator;

/**
 * Class ProtocolRepositoryEloquent
 * @package namespace SpedRest\Repositories;
 */
class ProtocolRepositoryEloquent extends BaseRepository implements ProtocolRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Protocol::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
