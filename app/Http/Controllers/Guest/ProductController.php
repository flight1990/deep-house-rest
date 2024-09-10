<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Products\FindProductAction;
use App\Actions\Products\GetProductsAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\GetProductsRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends BaseController
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
