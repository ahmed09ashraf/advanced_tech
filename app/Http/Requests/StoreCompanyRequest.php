<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
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
           
                // 'title' => 'required|min:3|unique:posts',
    
                'name' => [
                    'required',
                    'min:3',
                    Rule::unique('companies')->ignore($this->company),
                ],
                
                'email' => [
                    'required',
                    Rule::unique('companies')->ignore($this->company),
                ],
                'website' => 'required',
                'logo' => 'mimes:jpeg,png,jpg,gif',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'email.required' => 'The email is required',
        ];
    }
}
