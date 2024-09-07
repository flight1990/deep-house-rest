<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'title' => $this->whenHas('title'),
            'message' => $this->whenHas('message'),
            'user_id' => $this->whenHas('user_id'),
            'product_id' => $this->whenHas('product_id'),
            'is_active' => $this->whenHas('is_active'),
            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
