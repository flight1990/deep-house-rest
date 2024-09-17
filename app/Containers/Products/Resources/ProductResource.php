<?php

namespace App\Containers\Products\Resources;

use App\Containers\Categories\Resources\CategoryResource;
use App\Containers\Media\Resources\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'description' => $this->whenHas('description'),
            'price' => $this->whenHas('price'),
            'category_id' => $this->whenHas('category_id'),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'photos' => MediaResource::collection($this->whenLoaded('photos'))
        ];
    }
}
