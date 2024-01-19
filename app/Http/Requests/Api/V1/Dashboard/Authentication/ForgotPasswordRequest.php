<?php

namespace App\Http\Requests\Api\V1\Dashboard\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email,deleted_at,NULL'],
        ];
    }
}
