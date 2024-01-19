<?php

namespace App\Http\Resources\V1\Dashboard\Address;

use App\Http\Resources\V1\Dashboard\User\UserResource;
use App\Http\Resources\V1\Public\Country\CountryResource;
use App\Http\Resources\V1\Public\State\StateResource;
use App\Http\Resources\V1\Public\Suburb\SuburbResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'postcode' => $this->postcode,
            'address_type' => strtolower($this->address_type->name),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => UserResource::make($this->whenLoaded('addresses')),
            'suburb' => SuburbResource::make($this->suburb),
            'state' => StateResource::make($this->state),
            'country' => CountryResource::make($this->country),
        ];
    }
}
