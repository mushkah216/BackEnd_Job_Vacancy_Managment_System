<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
             
           
            'title'=>'sometimes|string|max:100',
            'descrption'=>'sometimes|string',
            'requirement'=>'sometimes|string',
            'min_salary'=>'sometimes|string|max:50',
            'max_salary'=>'sometimes|numeric',
            'status'=>'sometimes|in:remote,onSite'
         
        ];
    }
}
