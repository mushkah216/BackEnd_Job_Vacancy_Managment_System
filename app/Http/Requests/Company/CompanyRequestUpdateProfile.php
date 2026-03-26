<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequestUpdateProfile extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'sometimes|string|max:100',
            'email'=>'sometimes|unique:companies,email|max:150',
            'description'=>'sometimes|string',
            'website'=>'sometimes|string',
            'logo'=>'sometimes|string',
             'location'=>'sometimes|string'
        ];
    }
}
