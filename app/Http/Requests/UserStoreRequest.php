<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => false, 'message' => $validator->errors()], 402));
    }
    
    public function rules(): array
    {
        return [
            //
            'name'=>[
                'required',
                'min:5',
                'max:10',
                Rule::unique('users')->ignore($this->id),        
            ],
            'email'=>[
                'required',
                'min:5',
                'max:20',
                Rule::unique('users')->ignore($this->id),        
            ],
            'password'=>[
                'required',
                'min:5',
                'max:10',
                Rule::unique('users')->ignore($this->id),        
            ],
            // 'role_id'=>[
            //     'required',
            //     Rule::unique('users')->ignore($this->id),        
            // ],
        ];
    }
}
