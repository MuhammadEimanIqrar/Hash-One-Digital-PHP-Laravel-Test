<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'Description' => $this->description,
            'CompantDetail' => $this->company_detail,
            'CreatedAt' => date(timestampFormat(), strtotime($this->created_at)),
            'UpdatedAt' => date(timestampFormat(), strtotime($this->updated_at)),
            'DeletedAt' => date(timestampFormat(), strtotime($this->deleted_at)),
            'Requirements' => JobRequirementResource::collection($this->requirements),
            'PostedBy' => new UserResource($this->user),
        ];
    }
}
