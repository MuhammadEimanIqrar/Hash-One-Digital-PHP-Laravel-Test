<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobRequirementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'Title' => $this->title,
            'CreatedAt' => date(timestampFormat(), strtotime($this->created_at)),
            'UpdatedAt' => date(timestampFormat(), strtotime($this->updated_at)),
            'DeletedAt' => date(timestampFormat(), strtotime($this->deleted_at)),
        ];
    }
}
