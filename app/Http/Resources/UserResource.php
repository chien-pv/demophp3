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
            "uid"=>$this->id,
            "ten"=>$this->name,
            "gmail"=>$this->email,
            "hinhanh"=>$this->profile_photo_url,
        ];
    }
}
