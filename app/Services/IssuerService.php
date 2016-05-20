<?php

namespace SpedRest\Services;

use SpedRest\Repositories\IssuerRepository;
use SpedRest\Validators\IssuerValidator;
use SpedRest\Entities\Certificate;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;

use NFePHP\Common\Certificate\Pkcs12;
use NFePHP\Common\Certificate\Asn;

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
     *
     * @var Filesystem
     */
    protected $filesystem;
    
    /**
     *
     * @var Storage
     */
    protected $storage;

    /**
     * Construtor
     * Carrega o repositorio de acesso aos dados
     * @param IssuerRepository $repository
     */
    public function __construct(
        IssuerRepository $repository,
        IssuerValidator $validator,
        Filesystem $filesystem,
        Storage $storage
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
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
    
    public function certificateStore(array $data, $id)
    {
        $issuer = $this->repository->find($id);
        $cnpj = $issuer->cnpj;
        $this->storage->makeDirectory($cnpj . DIRECTORY_SEPARATOR . 'certs');
        $pathCerts = storage_path()
            . DIRECTORY_SEPARATOR
            . 'app'
            . DIRECTORY_SEPARATOR
            . $cnpj
            . DIRECTORY_SEPARATOR
            . 'certs'
            . DIRECTORY_SEPARATOR;
        if (empty($data['pfxfile'])) {
            return [
                'error' => 'certificado',
                'errorDescription' => 'O certificado PFX é obrigatório'
            ];
        }
        $content = $this->filesystem->get($data['pfxfile']);
        $chain = '';
        if (!empty($data['chainfile'])) {
            $chain  = $this->filesystem->get($data['chainfile']);
        }
        $password = $data['secret'];
        try {
            $pkcs12 = new Pkcs12($pathCerts, $cnpj, '', '', '', false);
            $pkcs12->loadPfx($content, $password, false, false, false);
        } catch (\RuntimeException $e) {
            return [
                'error' => 'certificado',
                'errorDescription' => $e->getMessage()
            ];
        } catch (\InvalidArgumentException $e) {
            return [
                'error' => 'certificado',
                'errorDescription' => $e->getMessage()
            ];
        }
        if (!empty(trim($chain))) {
            //verificar se é um certificado pem
            //se for anexar ao certKey usando $pkcs12->addChain(array)
            $pkcs12->addChain([$chain]);
        }
        $dados = [
            'pfx' => base64_encode($content),
            'chain' => $chain,
            'secret' => $password,
            'prikey' => $pkcs12->priKey,
            'pubkey' => $pkcs12->pubKey,
            'certkey' => $pkcs12->certKey,
            'cnpj' => $pkcs12->getCNPJCert(),
            'validity' => date('Y-m-d H:i:s', $pkcs12->getValidate())
        ];
        $issuer->certificate()->where('issuer_id', $id)->delete();
        return $issuer->certificate()->create($dados);
    }
    
    public function environmentStore(array $data, $id)
    {
        $issuer = $this->repository->find($id);
        $issuer->environment()->where('issuer_id', $id)->delete();
        return $issuer->environment()->create($data);
    }
    
    public function contingencyStore(array $data, $id)
    {
        $issuer = $this->repository->find($id);
        $issuer->contingency()->where('issuer_id', $id)->delete();
        return $issuer->contingency()->create($data);
    }
    
    public function protocolStore(array $data, $id)
    {
        $issuer = $this->repository->find($id);
        $issuer->protocol()->where('issuer_id', $id)->delete();
        return $issuer->protocol()->create($data);
    }
}
