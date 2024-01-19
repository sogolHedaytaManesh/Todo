<?php

namespace App\Http\Requests\Api\V1\Dashboard\Todo;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'title'       => ['required', 'string', 'min:3', 'max:255'],
			'description' => ['required', 'string', 'min:3', 'max:755'],
		];
	}
}
