<?php

namespace App\Http\Requests\Api\V1\Dashboard\Authentication;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class EmailVerificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'signature' => ['required', 'string'],
            'expires' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'signature.required' => __('auth.invalid_verification_link'),
            'expires.required' => __('auth.invalid_verification_link'),
        ];
    }

    protected function passedValidation(): void
    {
        if (! $user = User::findOrFail($this->route('id'))) {
            throw ValidationException::withMessages(['id' => __('auth.invalid_verification_link')]);
        }

        $this->merge([
            'user' => $user,
        ]);

        if (! hash_equals(
            (string) $this->route('id'),
            (string) $this->user->getKey()
        )) {
            throw ValidationException::withMessages(['id' => __('auth.invalid_verification_link')]);
        }

        if (! hash_equals(
            (string) $this->route('hash'),
            sha1($this->user->getEmailForVerification())
        )) {
            throw ValidationException::withMessages(['id' => __('auth.invalid_verification_link')]);
        }
    }
}
