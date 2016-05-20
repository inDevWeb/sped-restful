<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use SpedRest\Entities\Issuer;
use SpedRest\Repositories\IssuerRepository;

class IssuerRepositoryEloquent extends BaseRepository implements IssuerRepository
{
    public function model()
    {
        return Issuer::class;
    }
    
    
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function isOwner($issuerId, $userId)
    {
        //if ($this->findWhere(['cnpj']))
        
    }
}
