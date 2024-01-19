<?php

namespace App\Models\Traits\Scopes;

use App\Enums\TodoStatusEnum;
use App\Filters\TodoFilters;
use Illuminate\Database\Eloquent\Builder;

trait TodoScopesTrait
{
	public function scopeFilter(Builder $builder, array $params): void
	{
		(new TodoFilters($builder))->apply($params);
	}

	public function scopeIncomplete(Builder $builder): Builder
	{
		return $this->where('status', TodoStatusEnum::INCOMPLETE->value);
	}

	public function scopeDate(Builder $builder, string $date): Builder
	{
		return $this->where('created_at', '<=', $date);
	}
}
