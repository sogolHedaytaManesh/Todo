<?php

namespace App\Http\Resources\V1\Dashboard\RegistrationLevel;

use App\Http\Resources\V1\Dashboard\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationLevelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'status' => strtolower($this->status->name),
            'level' => strtolower($this->level->name),
            'approvable' => strtolower($this->approvable->name),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
