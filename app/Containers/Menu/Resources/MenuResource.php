<?php

namespace App\Containers\Menu\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'url' => $this->whenHas('url'),
            'parent_id' => $this->whenHas('parent_id'),
            'children' => MenuResource::collection($this->whenLoaded('children'))
        ];
    }
}
