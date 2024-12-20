<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => $this->role, // Role (0 = Owner, 1 = Admin, 2 = Member, 3 = Guest)
            'user_id' => $this->user_id,
            'organization_id' => $this->org_id,
            'status' => $this->status, // Status (0 = Active, 1 = Suspended, 2 = Left)
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
