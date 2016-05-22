<?php

namespace SpedRest\Http\Controllers;

//use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

use SpedRest\Http\Requests;
use SpedRest\Entities\Environment;
use SpedRest\Repositories\EnvironmentRepository;
use SpedRest\Services\IssuerService;
use SpedRest\Validators\EnvironmentValidator;

class EnvironmentController extends Controller
{
    /**
     *
     * @var EnvironmentRepository
     *
     */
    protected $repository;
    
    /**
     *
     * @var IssuerService
     */
    protected $service;
    
    /**
     *
     * @var EnvironmentValidator
     */
    protected $validator;


    public function __construct(
        EnvironmentRepository $repository,
        IssuerService $service,
        EnvironmentValidator $validator
    ) {
        $this->repository = $repository;
        $this->service = $service;
        $this->validator = $validator;
    }
    
    public function store(Request $request, $id)
    {
        $tpAmb = $request->tpAmb;
        $data = ['tpAmb' => $tpAmb];
        try {
            $this->validator->with($data)->passesOrFail();
        } catch (ValidatorException $e) {
            return ['error' => 'Tipo de ambiente', 'errorDescription' => 'tpAmb deve ser 1 ou 2'];
        }
        $desc = 'homologacao';
        if ($tpAmb > 2 || $tpAmb < 1) {
            $tpAmb = 2;
        }
        if ($tpAmb == 1) {
            $desc = 'producao';
        }
        $data = [
            'tpAmb' => $tpAmb,
            'description' => $desc
        ];
        return $this->service->environmentStore($data, $id);
    }
    
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
}
