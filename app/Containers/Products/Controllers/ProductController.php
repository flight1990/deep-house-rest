<?php

namespace App\Containers\Products\Controllers;

use App\Containers\Products\Actions\FindProductAction;
use App\Containers\Products\Actions\GetProductsAction;
use App\Containers\Products\Requests\GetProductsRequest;
use App\Containers\Products\Resources\ProductResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends ApiController
{
    public function __construct(
        protected GetProductsAction $getProductsAction,
        protected FindProductAction $findProductAction,
    )
    {
    }

    public function index(GetProductsRequest $request): ResourceCollection
    {
        $data = $this->getProductsAction->run($request->validated());
        return $this->respondWithSuccess(ProductResource::collection($data));
    }

    public function show(string $slug): JsonResource
    {
        $data = $this->findProductAction->run($slug);
        return $this->respondWithSuccess(new ProductResource($data));
    }
}
