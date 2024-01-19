<?php

namespace App\Models\Traits\Methods;

use Illuminate\Auth\Events\Verified;

trait UserMethodsTrait
{
	public function markEmailVerified(): void
	{
		if ($this->markEmailAsVerified()) {
			event(new Verified($this));
		}
	}

	public function hasVerifiedEmail(): bool
	{
		return (bool)$this->email_verified_at;
	}
}
