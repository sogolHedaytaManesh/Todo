<?php

namespace App\Http\Resources\V1\Public\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'media' => $this->media,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
