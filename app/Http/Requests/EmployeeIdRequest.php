<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeIdRequest extends FormRequest
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
            'employeeId' => 'required|exists:employees,id',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'employeeId.required' => 'Employee ID is required.',
            'employeeId.exists'   => 'The selected company does not exist.',
        ];
    }
}