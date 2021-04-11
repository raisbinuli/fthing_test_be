<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class CustomerUpdateRequest extends FormRequest
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
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {        
        return [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:customers,email,'.$request->route('customer')->id.'|max:50',
            'gender' => 'required|in:P,L',
            'is_married' => 'required|in:0,1',
            'address' => 'required'
        ];
    }
}
