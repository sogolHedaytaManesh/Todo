<?php

namespace App\Http\Resources\V1\Dashboard\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
	public function toArray($request): array
	{
		return [
			'id'          => $this->id,
			'full_name'   => $this->fullname,
			'first_name'  => $this->first_name,
			'last_name'   => $this->last_name,
			'email'       => $this->email,
			'created_at'  => $this->created_at,
			'updated_at'  => $this->updated_at,
			'is_verified' => (bool)$this->email_verified_at
		];
	}
}
