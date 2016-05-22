<?php

namespace SpedRest\Http\Controllers;

use Illuminate\Http\Request;
use SpedRest\Http\Requests;
use SpedRest\Entities\Contingency;
use SpedRest\Repositories\ContingencyRepository;
use SpedRest\Services\IssuerService;

class ContingencyController extends Controller
{
    /**
     *
     * @var ContingencyRepository
     *
     */
    protected $repository;
    
    /**
     *
     * @var IssuerService
     */
    protected $service;
    
    public function __construct(
        ContingencyRepository $repository,
        IssuerService $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function store(Request $request, $id)
    {
        $motivo = $request->motivo;
        $tipo = strtoupper($request->tipo);
        $hora = date('Y-m-d H:i:s');
        if (strlen($motivo) < 15) {
            return ['error' => 'Motivo', 'errorDescription' => 'O campo motivo deve ser pelo menos 15 digitos.'];
        }
        if ($tipo != 'EPEC' && substr($tipo, 0, 3) != 'SVC') {
            return ['error' => 'Tipo', 'errorDescription' => 'Existem apenas dois tipos de Contingência EPEC ou SVC.'];
        }
        $data = ['tipo' => $tipo,'motivo' => $motivo, 'hora' => $hora];
        return $this->service->contingencyStore($data, $id);
    }
    
    public function show($id)
    {
        return $this->repository->findWhere(['issuer_id' => $id]);
    }
    
    public function destroy($id)
    {
        return $this->service->contingencyDestroy($id);
    }
}
