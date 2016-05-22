<?php

namespace SpedRest\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class EnvironmentValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'tpAmb' => 'required|integer|max:2'
        ]
    ];
}
