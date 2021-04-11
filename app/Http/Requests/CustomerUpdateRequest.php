<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\FailedRequest;

class CustomerUpdateRequest extends FormRequest
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
