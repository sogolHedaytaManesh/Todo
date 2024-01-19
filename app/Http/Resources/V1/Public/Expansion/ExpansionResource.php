<?php

namespace App\Http\Resources\V1\Public\Expansion;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpansionResource extends JsonResource
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
