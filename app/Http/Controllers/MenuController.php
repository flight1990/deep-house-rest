<?php

namespace App\Http\Controllers;

use App\Actions\CreateMenuAction;
use App\Actions\DeleteMenuAction;
use App\Actions\FindMenuAction;
use App\Actions\GetMenuAction;
use App\Actions\UpdateMenuAction;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Resources\MenuResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getMenuAction->run($request->all());
        return $this->respondWithSuccess(MenuResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findMenuAction->run($id);
        return $this->respondWithSuccess(new MenuResource($data));
    }

    public function store(CreateMenuRequest $request): JsonResource
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
