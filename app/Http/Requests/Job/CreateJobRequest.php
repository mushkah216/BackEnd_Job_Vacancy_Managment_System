<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'company_id'=>'exists:companies,id',
            'title'=>'required|string|max:100',
            'descrption'=>'required|string',
            'requirement'=>'required|string',
            'min_salary'=>'required|string|max:50',
            'max_salary'=>'required|numeric',
            'status'=>'nullable|in:remote,onSite'
        ];
    }
}
