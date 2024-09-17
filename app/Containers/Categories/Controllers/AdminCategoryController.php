<?php

namespace App\Containers\Categories\Controllers;

use App\Containers\Categories\Actions\CreateCategoryAction;
use App\Containers\Categories\Actions\DeleteCategoryAction;
use App\Containers\Categories\Actions\FindCategoryAction;
use App\Containers\Categories\Actions\GetCategoriesAction;
use App\Containers\Categories\Actions\UpdateCategoryAction;
use App\Containers\Categories\Requests\CreateCategoryRequest;
use App\Containers\Categories\Requests\GetCategoriesRequest;
use App\Containers\Categories\Requests\UpdateCategoryRequest;
use App\Containers\Categories\Resources\CategoryResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCategoryController extends ApiController
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
