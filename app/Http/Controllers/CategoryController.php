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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getCategoriesAction->run($request->all());
        return $this->respondWithSuccess(CategoryResource::collection($data));
    }

    public function show(int|string $identifier): JsonResource
    {
        $data = $this->findCategoryAction->run($identifier);
        return $this->respondWithSuccess(new CategoryResource($data));
    }

    public function store(CreateCategoryRequest $request): JsonResource
    {
        $data = $this->createCategoryAction->run($request->validated());
        return $this->respondWithSuccessCreate(new CategoryResource($data));
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResource
    {
        $data = $this->updateCategoryAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new CategoryResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteCategoryAction->run($id);
        return $this->noContent();
    }
}
