<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TenantUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $this->tenant->id],
            'phone' => ['required', 'string', 'max:16'],
            'school_name' => ['required', 'string', 'max:255'],
            'domain_name' => ['required', 'min:3', 'max:255', 'unique:tenants,domain,' . $this->tenant->id],
            'database' => ['required', 'min:3', 'max:255'],
            'database_username' => ['required', 'min:3', 'max:255'],
        ];
    }
}
