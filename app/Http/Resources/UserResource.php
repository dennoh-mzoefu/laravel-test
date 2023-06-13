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
            
            'jina' => $this->name,
            'cheo' => $this->work_title,
            'marriage_status' => $this->ismarried,   
        ];
        // return parent::toArray($request);
    }
}
