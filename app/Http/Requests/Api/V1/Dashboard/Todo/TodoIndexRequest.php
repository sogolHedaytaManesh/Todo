<?php

namespace App\Http\Requests\Api\V1\Dashboard\Todo;

use App\Enums\Global\Sort;
use App\Enums\TodoStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TodoIndexRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'sort'   => ['sometimes', 'string', Rule::in(Sort::getLoweCaseNames())],
			'status' => ['sometimes', 'string', Rule::in(TodoStatusEnum::getLoweCaseNames())],
			'title'  => ['sometimes', 'string'],
			'ids'    => ['sometimes', 'array'],
			'ids.*'  => ['sometimes', 'integer', 'exists:todos,id'],
		];
	}
}
