<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'completed_at' => $this->completed_at,
            'assigned_to' => $this->assigned_to,
            'completed_by' => $this->completed_by,
            'notes' => $this->notes,
            'created_by' => $this->created_by,
            'project_id' => $this->project_id,
            'status' => $this->status,
            'due_at' => $this->due_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
