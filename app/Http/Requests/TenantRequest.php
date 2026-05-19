<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email'],
            'phone' => ['required', 'string', 'max:16'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'school_name' => ['required', 'string', 'max:255'],
            'domain_name' => ['required', 'unique:tenants,domain', 'min:3', 'max:255'],
            'database' => ['required', 'min:3', 'max:255'],
            'database_username' => ['required', 'min:3', 'max:255'],
            'database_password' => ['required', 'min:4'],
        ];
    }
}
