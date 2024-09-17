<?php

namespace App\Containers\Reviews\Resources;

use App\Containers\Products\Resources\ProductResource;
use App\Containers\Users\Resources\UserResource;
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
            'name' => $this->whenHas('name'),
            'phone' => $this->whenHas('phone'),
            'email' => $this->whenHas('email'),
            'user_id' => $this->whenHas('user_id'),
            'product_id' => $this->whenHas('product_id'),
            'is_active' => $this->whenHas('is_active'),
            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
