<?php

namespace App\Http\Controllers;

use App\Actions\CreateMenuAction;
use App\Actions\DeleteMenuAction;
use App\Actions\FindMenuAction;
use App\Actions\GetMenuAction;
use App\Actions\UpdateMenuAction;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MenuResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function index(Request $request): JsonResponse
    {
        $data = $this->getMenuAction->run($request->all());
        return $this->sendResponse(MenuResource::collection($data));
    }

    public function show(int $id): JsonResponse
    {
        try {
            $data = $this->findMenuAction->run($id);
            return $this->sendResponse(new MenuResource($data));
        } catch (ModelNotFoundException $e) {
            return $this->sendSimpleError('Menu item not found.');
        }
    }

    public function store(CreateMenuRequest $request): JsonResponse
    {
        $data = $this->createMenuAction->run($request->validated());
        return $this->sendResponse(new MenuResource($data), 'Menu item created.', 201);
    }

    public function update(UpdateMenuRequest $request, int $id): JsonResponse
    {
        try {
            $data = $this->updateMenuAction->run($request->validated(), $id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Menu item not found.');
        }

        return $this->sendResponse(new CategoryResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->deleteMenuAction->run($id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Menu item not found.');
        }

        return $this->sendResponse(null, 'Menu item deleted.', 204);
    }
}
