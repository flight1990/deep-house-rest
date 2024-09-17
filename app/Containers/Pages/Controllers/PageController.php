<?php

namespace App\Containers\Pages\Controllers;

use App\Containers\Pages\Actions\FindPageAction;
use App\Containers\Pages\Actions\GetPagesAction;
use App\Containers\Pages\Requests\GetPagesRequest;
use App\Containers\Pages\Resources\PageResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageController extends ApiController
{
    public function __construct(
        protected GetPagesAction $getPagesAction,
        protected FindPageAction $findPageAction,
    )
    {
    }

    public function index(GetPagesRequest $request): ResourceCollection
    {
        $data = $this->getPagesAction->run($request->validated());
        return $this->respondWithSuccess(PageResource::collection($data));
    }

    public function show(string $slug): JsonResource
    {
        $data = $this->findPageAction->run($slug);
        return $this->respondWithSuccess(new PageResource($data));
    }
}
