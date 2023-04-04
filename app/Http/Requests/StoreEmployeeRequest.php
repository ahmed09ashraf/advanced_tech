<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
    
            'first_name' => [
                'required',
                'min:3',
            ],
            'last_name' => [
                'required',
                'min:3',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('employees')->ignore($this->employee),
            ],
            'phone' => 'required',
            'company_id'=>'required'
        
    ];
}

public function messages()
{
    return [
        'first_name.required' => 'The first name is required',
        'last_name.required' => 'The last name is required',
        'email.required' => 'The email is required',
    ];
}
}
