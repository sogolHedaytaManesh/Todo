<?php

namespace App\Models\Traits\Relations;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelationsTrait
{
	public function todos(): HasMany
	{
		return $this->hasMany(Todo::class);
	}
}
