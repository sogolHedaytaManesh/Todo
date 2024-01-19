<?php

namespace App\Http\Resources\V1\Public\Suburb;

use Illuminate\Http\Resources\Json\JsonResource;

class SuburbResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],

        ];
    }
}
