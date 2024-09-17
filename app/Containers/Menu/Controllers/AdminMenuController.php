<?php

namespace App\Containers\Menu\Controllers;

use App\Containers\Menu\Actions\CreateMenuAction;
use App\Containers\Menu\Actions\DeleteMenuAction;
use App\Containers\Menu\Actions\FindMenuAction;
use App\Containers\Menu\Actions\GetMenuAction;
use App\Containers\Menu\Actions\UpdateMenuAction;
use App\Containers\Menu\Requests\CreateMenuRequest;
use App\Containers\Menu\Requests\GetMenuRequest;
use App\Containers\Menu\Requests\UpdateMenuRequest;
use App\Containers\Menu\Resources\MenuResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminMenuController extends ApiController
{
    public function __construct(
        protected GetMenuAction    $getMenuAction,
        protected FindMenuAction   $findMenuAction,
        protected CreateMenuAction $createMenuAction,
        protected UpdateMenuAction $updateMenuAction,
        protected DeleteMenuAction $deleteMenuAction
    )
    {
    }

    public function index(GetMenuRequest $request): ResourceCollection
    {
        $data = $this->getMenuAction->run($request->validated());
        return $this->respondWithSuccess(MenuResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findMenuAction->run($id);
        return $this->respondWithSuccess(new MenuResource($data));
    }

    public function store(CreateMenuRequest $request): JsonResponse
    {
        $data = $this->createMenuAction->run($request->validated());
        return $this->respondWithSuccessCreate(new MenuResource($data));
    }

    public function update(UpdateMenuRequest $request, int $id): JsonResource
    {
        $data = $this->updateMenuAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new MenuResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteMenuAction->run($id);
        return $this->noContent();
    }
}
