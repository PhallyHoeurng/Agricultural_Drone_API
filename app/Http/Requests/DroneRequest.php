<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DroneRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'drone_type' => 'required',
            'battery' => 'required',
            'speed' => 'required',
            'start_date' => 'required',
            'end_date' => 'required' || null,
        ];
    }
}
