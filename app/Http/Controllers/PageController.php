<?php

namespace App\Http\Controllers;

use App\Actions\CreatePageAction;
use App\Actions\DeletePageAction;
use App\Actions\FindPageAction;
use App\Actions\GetPagesAction;
use App\Actions\UpdatePageAction;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Resources\PageResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageController extends BaseController
{
    public function __construct(
        protected GetPagesAction   $getPagesAction,
        protected FindPageAction   $findPageAction,
        protected CreatePageAction $createPageAction,
        protected UpdatePageAction $updatePageAction,
        protected DeletePageAction $deletePageAction
    )
    {
    }

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getPagesAction->run($request->all());
        return $this->respondWithSuccess(PageResource::collection($data));
    }

    public function show(int|string $identifier): JsonResource
    {
        $data = $this->findPageAction->run($identifier);
        return $this->respondWithSuccess(new PageResource($data));
    }

    public function store(CreatePageRequest $request): JsonResource
    {
        $data = $this->createPageAction->run($request->validated());
        return $this->respondWithSuccessCreate(new PageResource($data));
    }

    public function update(UpdatePageRequest $request, int $id): JsonResource
    {
        $data = $this->updatePageAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new PageResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deletePageAction->run($id);
        return $this->noContent();
    }
}
