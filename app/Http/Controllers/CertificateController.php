<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;
use SpedRest\Http\Requests;
use SpedRest\Repositories\IssuerRepository;
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
     * @param IssuerRepository $repository
     */
    public function __construct(IssuerRepository $repository, IssuerService $service)
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
        $file = $request->file('pfx');
        $extension = $file->getClientOriginalExtension();
        $pass = $request->secret;
        
        $data = [
            'file' => $file,
            'extension' => $extension,
            'secret' => $pass,
            'chain' => $request->chain
        ];
        
        $dados = $this->service->certificateStore($data, $id);
        return $dados;
    }
    
    /**
     * Retorna os dados de um emitente
     * Pode ser acessado pelo Admin ou pelo próprio emitente
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return '';
    }
}
