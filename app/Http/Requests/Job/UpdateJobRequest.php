<?php

namespace App\Http\Requests\Job;

use App\Traits\JobTypeValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateJobRequest extends FormRequest
{
    use JobTypeValidation;

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
            'title'       => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'job_type'    => 'sometimes|in:PJ,CLT,Estagio',
            'company_id'  => 'sometimes|exists:companies,id',
            'salary'      => 'nullable|numeric|min:0',
            'work_hours'  => 'nullable|integer|min:0|max:24',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $this->validateJobType($validator);
    }
}
