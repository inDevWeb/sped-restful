<?php

namespace SpedRest\Validators;

use Prettus\Validator\LaravelValidator;

class CertificateValidator extends LaravelValidator
{
    protected $rules = [
        'pfx' => 'required',
        'chain' => '',
        'secret' => 'required',
        'cnpj' => '',
        'validity' => ''
    ];
}
