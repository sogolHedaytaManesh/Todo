<?php

namespace App\Http\Requests\Api\V1\Dashboard\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'first_name' => ['required', 'string', 'min:3', 'max:255'],
			'last_name'  => ['required', 'string', 'min:3', 'max:255'],
			'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password'   => ['required', 'confirmed', Rules\Password::defaults()],
		];
	}
}
