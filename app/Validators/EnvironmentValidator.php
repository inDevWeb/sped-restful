<?php

namespace SpedRest\Validators;

use Prettus\Validator\LaravelValidator;

class EnvironmentValidator extends LaravelValidator
{
    protected $rules = [
        'tpAmb' => 'required|max:1'
    ];
}
