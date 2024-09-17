<?php

namespace App\Containers\Pages\Controllers;

use App\Containers\Pages\Actions\CreatePageAction;
use App\Containers\Pages\Actions\DeletePageAction;
use App\Containers\Pages\Actions\FindPageAction;
use App\Containers\Pages\Actions\GetPagesAction;
use App\Containers\Pages\Actions\UpdatePageAction;
use App\Containers\Pages\Requests\CreatePageRequest;
use App\Containers\Pages\Requests\GetPagesRequest;
use App\Containers\Pages\Requests\UpdatePageRequest;
use App\Containers\Pages\Resources\PageResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminPageController extends ApiController
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

    public function index(GetPagesRequest $request): ResourceCollection
    {
        $data = $this->getPagesAction->run($request->validated());
        return $this->respondWithSuccess(PageResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findPageAction->run($id);
        return $this->respondWithSuccess(new PageResource($data));
    }

    public function store(CreatePageRequest $request): JsonResponse
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
