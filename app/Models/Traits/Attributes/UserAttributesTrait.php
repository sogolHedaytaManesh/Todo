<?php

namespace App\Models\Traits\Attributes;

trait UserAttributesTrait
{
	public function getFullNameAttribute(): string
	{
		return sprintf("%s %s", $this->first_name, $this->last_name);
	}
}
