<?php

namespace SpedRest\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use SpedRest\Entities\Certificate;
use SpedRest\Repositories\CertificateRepository;

class CertificateRepositoryEloquent extends BaseRepository implements CertificateRepository
{
    public function model()
    {
        return Certificate::class;
    }
}
