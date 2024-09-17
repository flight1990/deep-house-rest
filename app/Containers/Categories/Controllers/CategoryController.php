<?php

namespace App\Containers\Categories\Controllers;

use App\Containers\Categories\Actions\FindCategoryAction;
use App\Containers\Categories\Actions\GetCategoriesAction;
use App\Containers\Categories\Requests\GetCategoriesRequest;
use App\Containers\Categories\Resources\CategoryResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends ApiController
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction,
        protected FindCategoryAction  $findCategoryAction,
    )
    {
    }

    public function index(GetCategoriesRequest $request): ResourceCollection
    {
        $data = $this->getCategoriesAction->run($request->validated());
        return $this->respondWithSuccess(CategoryResource::collection($data));
    }

    public function show(string $slug): JsonResource
    {
        $data = $this->findCategoryAction->run($slug);
        return $this->respondWithSuccess(new CategoryResource($data));
    }
}
