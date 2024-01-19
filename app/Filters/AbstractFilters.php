<?php

namespace App\Filters;

use App\Helpers\StringConverter;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilters
{
	public function __construct(public Builder $builder)
	{
	}

	public function apply($params): void
	{
		foreach ($params as $methodName => $value) {
			$methodCamelCaseName = resolve(StringConverter::class)->convertSnakeCaseToCamelCase($methodName);
			if (! method_exists($this, $methodCamelCaseName)) {
				continue;
			}
			if (is_null($value)) {
				continue;
			}
			$this->$methodCamelCaseName($value);
		}
	}
}
