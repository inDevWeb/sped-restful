<?php

namespace SpedRest\Services;

use SpedRest\Repositories\CertificateRepository;
use SpedRest\Validators\CertificateValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class CertificateService
{
    /**
     *
     * @var CertificateRepository
     */
    protected $repository;
    
    /**
     *
     * @var CertificateValidator
     */
    protected $validator;

    /**
     * Construtor
     * Carrega o repositorio de acesso aos dados
     * @param CertificateRepository $repository
     * @param CertificateValidator $validator
     */
    public function __construct(CertificateRepository $repository, CertificateValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    /**
     * Cria novo registro
     * @param array $data
     * @return Response
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * Retorna os dados do certificado
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }
    
    /**
     * Altera registro atual
     * @param array $data
     * @param int $id
     * @return Response
     */
    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidationException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
}
