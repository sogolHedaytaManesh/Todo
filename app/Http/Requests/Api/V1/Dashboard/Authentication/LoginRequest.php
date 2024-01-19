<?php

namespace App\Http\Requests\Api\V1\Dashboard\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email'    => ['required', 'email'],
			'password' => ['required', 'string', 'min:8'],
		];
	}
}
