<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;
use SpedRest\Http\Requests;
use SpedRest\Repositories\CertificateRepository;
use SpedRest\Services\CertificateService;

class CertificateController extends Controller
{
    /**
     * Repository de acesso ao banco de dados
     * @var CertificateRepository
     */
    protected $repository;

    /**
     * Serviço com regras de negócio para acesso a base de dados
     * @var CertificateService
     */
    protected $service;

    /**
     * Construtora da classe
     * Instancia o repository
     * @param CertificateRepository $repository
     * @param CertificateService $service
     */
    public function __construct(CertificateRepository $repository, CertificateService $service)
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
    public function store(Request $request)
    {
        $file = $request->file('pfx');
        $extension = $file->getClientOriginalExtension();
        $content = \File::get($file);
        
        echo $request->secret;
        echo base64_encode($content);
        die;
        
        
        //return $this->service->create($request->all());
    }

    /**
     * Retorna os dados de um certificado
     * Pode ser acessado pelo Admin ou pelo próprio emitente
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * Atualiza dos dados do certificado
     * Pode ser acessado pelo Admin ou pelo próprio emitente
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Deleta certificado
     *
     * @param type $id
     * @return type
     */
    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}
