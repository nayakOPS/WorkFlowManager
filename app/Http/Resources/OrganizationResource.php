<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return[
            "id"=>$this->id,
            "avatar"=>$this->avatar,
            "name"=>$this->name,
            "description"=>$this->description,
            "address"=>$this->address,
            "phone"=>$this->phone,

        ];
    }
}
