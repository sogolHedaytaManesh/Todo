<?php

namespace App\Models\Traits\Scopes;

trait UserScopesTrait
{
	public function scopeIsRegistered($query, string $email)
	{
		return $query->where('email', $email);
	}
}
