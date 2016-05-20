<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;

use SpedRest\Http\Requests;
use SpedRest\Repositories\ProtocolRepository;
use SpedRest\Services\IssuerService;

class ProtocolController extends Controller
{
    protected $repository;
    
    public function __controler(ProtocolRepository $repository, IssuerService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function store(Request $request, $id)
    {
        $data = $this->service->protocolStore($request, $id);
        return $data;
    }
    
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
}
