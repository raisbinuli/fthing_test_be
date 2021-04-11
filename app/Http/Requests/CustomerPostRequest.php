<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\FailedRequest;

class CustomerPostRequest extends FormRequest
{
    use FailedRequest;
    
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
    public function rules()
    {
        // dd($request->name);
        return [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:customers,email|max:50',            
            'password' => 'required|min:8',
            'gender' => 'required|in:P,L',
            'is_married' => 'required|in:0,1',
            'address' => 'required'
        ];
    }
}
