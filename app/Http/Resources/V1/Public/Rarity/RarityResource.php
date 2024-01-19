<?php

namespace App\Http\Resources\V1\Public\Rarity;

use Illuminate\Http\Resources\Json\JsonResource;

class RarityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
