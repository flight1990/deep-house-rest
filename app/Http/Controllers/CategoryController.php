<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategoryAction;
use App\Actions\DeleteCategoryAction;
use App\Actions\FindCategoryAction;
use App\Actions\GetCategoriesAction;
use App\Actions\UpdateCategoryAction;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct(
        protected GetCategoriesAction  $getCategoriesAction,
        protected FindCategoryAction   $findCategoryAction,
        protected CreateCategoryAction $createCategoryAction,
        protected UpdateCategoryAction $updateCategoryAction,
        protected DeleteCategoryAction $deleteCategoryAction
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $data = $this->getCategoriesAction->run($request->all());
        return $this->sendResponse(CategoryResource::collection($data));
    }

    public function show(int|string $identifier): JsonResponse
    {
        try {
            $data = $this->findCategoryAction->run($identifier);
            return $this->sendResponse(new CategoryResource($data));
        } catch (ModelNotFoundException $e) {
            return $this->sendSimpleError('Category not found.');
        }
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $data = $this->createCategoryAction->run($request->validated());
        return $this->sendResponse(new CategoryResource($data), 'Category created.', 201);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        try {
            $data = $this->updateCategoryAction->run($request->validated(), $id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Category not found.');
        }

        return $this->sendResponse(new CategoryResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->deleteCategoryAction->run($id);
        } catch (ModelNotFoundException) {
            return $this->sendSimpleError('Category not found.');
        }

        return $this->sendResponse(null, 'Category deleted.', 204);
    }
}
