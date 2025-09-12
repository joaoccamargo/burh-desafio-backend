<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('id');

        return [
            'name'  => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $userId,
            'cpf'   => 'sometimes|required|string|size:11|unique:users,cpf,' . $userId,
            'age'   => 'sometimes|required|integer|min:0|max:150',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'The name field is required.',
            'name.string'    => 'The name must be a string.',
            'name.max'       => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email'    => 'The email must be a valid email address.',
            'email.unique'   => 'The email has already been taken.',
            'cpf.required'   => 'The CPF field is required.',
            'cpf.string'     => 'The CPF must be a string.',
            'cpf.size'       => 'The CPF must be exactly 11 characters.',
            'cpf.unique'     => 'The CPF has already been taken.',
            'age.required'   => 'The age field is required.',
            'age.integer'    => 'The age must be an integer.',
            'age.min'        => 'The age must be at least 0.',
            'age.max'        => 'The age may not be greater than 150.',
        ];
    }
}
