<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Pages\FindPageAction;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PageController extends BaseController
{
    public function __construct(
        protected FindPageAction $findPageAction,
    )
    {
    }

    public function show(string $slug): JsonResource
    {
        $data = $this->findPageAction->run($slug);
        return $this->respondWithSuccess(new PageResource($data));
    }
}
