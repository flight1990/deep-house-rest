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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function index(Request $request): JsonResponse
    {
        $data = $this->getPagesAction->run($request->all());
        return $this->sendResponse(PageResource::collection($data));
    }

    public function show(int|string $identifier): JsonResponse
    {
        try {
            $data = $this->findPageAction->run($identifier);
            return $this->sendResponse(new PageResource($data));
        } catch (ModelNotFoundException $e) {
            return $this->sendSimpleError('Page not found.');
        }
    }

    public function store(CreatePageRequest $request): JsonResponse
    {
        $data = $this->createPageAction->run($request->validated());
        return $this->sendResponse(new PageResource($data), 'Page created.', 201);
    }

    public function update(UpdatePageRequest $request, int $id): JsonResponse
    {
        try {
            $data = $this->updatePageAction->run($request->validated(), $id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Page not found.');
        }

        return $this->sendResponse(new PageResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->deletePageAction->run($id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Page not found.');
        }

        return $this->sendResponse(null, 'Page deleted.', 204);
    }
}
