<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait FailedRequest
{
    protected function failedValidation(Validator $validator)
    {
        
        $response = response()->json(
            Array(
                'result' => null,
                'status' => Array(
                    'response' => 'error',
                    'message' => $validator->errors(),
                    'code' => 422
                )
                
            ),422
        );  
        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
