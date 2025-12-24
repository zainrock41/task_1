<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyIdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Merge route parameters with request data for validation.
     */
    public function validationData(): array
    {
        return array_merge($this->request->all(), $this->route()->parameters());
    }

    /**
     * Get the validation rules for the request.
     */
    public function rules(): array
    {
        return [
            'companyId' => 'required|exists:companies,id',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'companyId.required' => 'Company ID is required.',
            'companyId.exists'   => 'The selected company does not exist.',
        ];
    }
}
