<?php

namespace App\Http\Resources\V1\Public\State;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
        ];
    }
}
