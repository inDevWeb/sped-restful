<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;
use SpedRest\Http\Requests;

use SpedRest\Repositories\CertificateRepository;
use SpedRest\Services\IssuerService;

class CertificateController extends Controller
{
    /**
     * Repository de acesso ao banco de dados
     * @var IssuerRepository
     */
    protected $repository;

    /**
     * Serviço com regras de negócio para acesso a base de dados
     * @var IssuerService
     */
    protected $service;

    /**
     * Construtora da classe
     * Instancia o repository
     * @param CertificateRepository $repository
     * @param IssuerService $service
     */
    public function __construct(CertificateRepository $repository, IssuerService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Grava um novo registro de emitente
     * Função exclusiva do admin !
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $pfxfile = $request->file('pfx');
        $chainfile = $request->file('chain');
        $extension = $pfxfile->getClientOriginalExtension();
        $pass = $request->secret;
        $data = [
            'pfxfile' => $pfxfile,
            'extension' => $extension,
            'secret' => $pass,
            'chainfile' => $chainfile
        ];
        $dados = $this->service->certificateStore($data, $id);
        return $dados;
    }
    
    /**
     * Retorna os dados de um certificado
     * Pode ser acessado pelo Admin ou qq usuário vinculado ao emitente
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
}
