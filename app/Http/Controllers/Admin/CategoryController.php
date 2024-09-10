<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\DeleteCategoryAction;
use App\Actions\Categories\FindCategoryAction;
use App\Actions\Categories\GetCategoriesAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Requests\Categories\GetCategoriesRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;
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

    public function index(GetCategoriesRequest $request): ResourceCollection
    {
        $data = $this->getCategoriesAction->run($request->validated());
        return $this->respondWithSuccess(CategoryResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findCategoryAction->run($id);
        return $this->respondWithSuccess(new CategoryResource($data));
    }

    public function store(CreateCategoryRequest $request): JsonResponse
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
