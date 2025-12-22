<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
            'companyId' => 'required|exists:companies,id',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'firstName.required' => 'First name is required.',
            'lastName.required'  => 'Last name is required.',
            'companyId.required' => 'Please select a company.',
            'companyId.exists'   => 'Selected company does not exist.',
            'email.email'         => 'Please enter a valid email address.',
        ];
    }
}
