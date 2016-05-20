<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;

use SpedRest\Http\Requests;
use SpedRest\Repositories\ContingencyRepository;
use SpedRest\Services\IssuerService;

class ContingencyController extends Controller
{
    protected $repository;
    protected $service;
    
    public function __controler(ContingencyRepository $repository, IssuerService $service)
    {
        $this->repository = $repository;
         $this->service = $service;
    }
    
    public function store(Request $request, $id)
    {
        $data = $this->service->certificateStore($request, $id);
        return $data;
    }
    
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
}
