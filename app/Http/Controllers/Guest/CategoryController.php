<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Categories\FindCategoryAction;
use App\Actions\Categories\GetCategoriesAction;
use App\Http\Controllers\BaseController;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends BaseController
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction,
        protected FindCategoryAction  $findCategoryAction,
    )
    {
    }

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getCategoriesAction->run($request->all());
        return $this->respondWithSuccess(CategoryResource::collection($data));
    }

    public function show(string $slug): JsonResource
    {
        $data = $this->findCategoryAction->run($slug);
        return $this->respondWithSuccess(new CategoryResource($data));
    }
}
