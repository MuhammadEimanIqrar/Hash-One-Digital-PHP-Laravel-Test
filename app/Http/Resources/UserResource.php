<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'Name' => $this->name,
            'Email' => $this->email,
            'EmailVerifiedAt' => date(timestampFormat(), strtotime($this->email_verified_at)),
            'CreatedAt' => date(timestampFormat(), strtotime($this->created_at)),
            'UpdatedAt' => date(timestampFormat(), strtotime($this->updated_at)),
            'DeletedAt' => date(timestampFormat(), strtotime($this->deleted_at)),
        ];
    }
}
