<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequestRegister extends FormRequest
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
            'name'=>'required|string|max:100',
            'email'=>'required|string|email|unique:companies|max:100',
            'password'=>'required|string|between:5,10|confirmed',
            'description'=>'nullable|string',
            'website'=>'nullable|string',
            'logo'=>'nullable|string',
            'status'=>'in:pending,approved,rejected',
            'location'=>'required|string|max:100'
        ];
    }
}
