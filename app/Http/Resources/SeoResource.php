<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'url' => $this->whenHas('url'),
            'title' => $this->whenHas('title'),
            'description' => $this->whenHas('description'),
            'keywords' => $this->whenHas('keywords'),
            'index' => $this->whenHas('index'),
            'follow' => $this->whenHas('follow'),
        ];
    }
}
