<?php

namespace App\Http\Resources\V1\Dashboard\User;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
	public function toArray($request): array
	{
		return [
			'id'           => $this->id,
			'title'        => $this->title,
			'description'  => $this->description,
			'status'       => $this->status,
			'published_at' => $this->published_at,
			'created_at'   => $this->created_at,
			'updated_at'   => $this->updated_at,
			'user'         => UserResource::make($this->whenLoaded('user')),
		];
	}
}
