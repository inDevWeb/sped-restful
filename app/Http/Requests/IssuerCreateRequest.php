<?php

namespace SpedRest\Http\Requests;

use SpedRest\Http\Requests\Request;

class IssuerCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->sanitize();
        return [
            //
        ];
    }
    
    public function sanitize()
    {
        $input = $this->all();
        dd($input);
        $input['name'] = filter_var(
            $input['name'],
            FILTER_SANITIZE_STRING
        );
        $input['description'] = filter_var(
            $input['description'],
            FILTER_SANITIZE_STRING
        );
        $this->replace($input);
    }
}
