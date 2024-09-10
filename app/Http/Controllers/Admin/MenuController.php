<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Menu\CreateMenuAction;
use App\Actions\Menu\DeleteMenuAction;
use App\Actions\Menu\FindMenuAction;
use App\Actions\Menu\GetMenuAction;
use App\Actions\Menu\UpdateMenuAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Menu\CreateMenuRequest;
use App\Http\Requests\Menu\GetMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Http\Resources\MenuResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuController extends BaseController
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
