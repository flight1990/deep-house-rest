<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Pages\FindPageAction;
use App\Actions\Pages\GetPagesAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Pages\GetPagesRequest;
use App\Http\Resources\PageResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageController extends BaseController
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
