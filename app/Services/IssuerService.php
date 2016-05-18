<?php

namespace SpedRest\Services;

use SpedRest\Repositories\IssuerRepository;
use SpedRest\Validators\IssuerValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class IssuerService
{
    /**
     *
     * @var IssuerRepository
     */
    protected $repository;
    
    /**
     *
     * @var IssuerValidator
     */
    protected $validator;


    /**
     * Construtor
     * Carrega o repositorio de acesso aos dados
     * @param IssuerRepository $repository
     */
    public function __construct(IssuerRepository $repository, IssuerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
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
