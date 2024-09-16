<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarouselResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'description' => $this->whenHas('description'),
            'link' => $this->whenHas('link'),
            'alt' => $this->whenHas('alt'),
            'photo_id' => $this->whenHas('photo_id'),
            'photo' => new MediaResource($this->whenLoaded('photo'))
        ];
    }
}
