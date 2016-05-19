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
        
        $content = $this->filesystem->get($data['file']);
        $password = $data['secret'];
        $pkcs12 = new Pkcs12($pathCerts, $cnpj, '', '', '', true);
        try {
            $pkcs12->loadPfx($content, $password, false, true, true);
        } catch (\Exception $e) {
            
        }     
        $prikey = $pkcs12->priKey;
        $pubkey = $pkcs12->pubKey;
        $certkey = $pkcs12->certKey;
        $expiretimestamp = $pkcs12->getValidate($pubkey);
        $validade = date('Y-m-d H:i:s', $expiretimestamp);
        $cnpjcert = Asn::getCNPJCert($pubkey);
        $chain = $data['chain'];
        $dados = [
            'pfx' => base64_encode($content),
            'chain' => $chain,
            'secret' => $password,
            'prikey' => $prikey,
            'pubkey' => $pubkey,
            'certkey' => $certkey,
            'cnpj' => $cnpjcert,
            'validity' => $validade
        ];
        
        $msg = array();
        if ($cnpjcert !== $cnpj) {
            $msg[] = ['error' => "O cnpj do certificado $cnpjcert não pertence a esse Emitente com o CNPJ $cnpj"];
        }
        $dHoje = gmmktime(0, 0, 0, date("m"), date("d"), date("Y"));
        //if ($expiretimestamp < $dHoje) {
        //    $msg[] = ['error' => "A validade do certificado expioru em " . date('d/m/Y', $expiretimestamp)];
        //}
        if (!empty($msg)) {
            return $msg;
        }
        $issuer->certificate()->where('issuer_id', $id)->delete();
        return $issuer->certificate()->create($dados);
        //Storage::put($cnpj.'.'.$data['extension'], File::get($data['file']));
    }
}
