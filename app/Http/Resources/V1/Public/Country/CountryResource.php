<?php

namespace App\Http\Resources\V1\Public\Country;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],

        ];
    }
}
