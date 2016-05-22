<?php

namespace SpedRest\Http\Controllers;

//use Illuminate\Http\Request;

use SpedRest\Http\Requests;
use SpedRest\Entities\Protocol;
use SpedRest\Repositories\ProtocolRepository;
use SpedRest\Services\IssuerService;

class ProtocolController extends Controller
{
    /**
     *
     * @var ProtocolRepository
     *
     */
    protected $repository;
    
    /**
     *
     * @var IssuerService
     */
    protected $service;
    
    public function __construct(
        ProtocolRepository $repository,
        IssuerService $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function store(Request $request, $id)
    {
        $prot = strtolower($request->protocol);
        $aSSL = ['tlsv1','sslv2','sslv3','tlsv1.0','tlsv1.1','tlsv1.2','default'];
        if (in_array($prot, $aSSL) === false) {
            return ['error' => 'SSL protocol', 'errorDescription' => "O protocolo indicado [$prot] não está disponivel."];
        }
        $data = ['protocol' => $prot];
        return $this->service->protocolStore($data, $id);
    }
    
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
}
