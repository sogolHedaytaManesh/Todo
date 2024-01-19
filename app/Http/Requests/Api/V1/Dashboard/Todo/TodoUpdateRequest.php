<?php

namespace App\Http\Requests\Api\V1\Dashboard\Todo;

use App\Enums\TodoStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TodoUpdateRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'status' => ['required', Rule::in(TodoStatusEnum::getLoweCaseNames())],
		];
	}
}
