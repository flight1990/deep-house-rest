<?php

namespace App\Containers\Products\Controllers;

use App\Containers\Products\Actions\CreateProductAction;
use App\Containers\Products\Actions\DeleteProductAction;
use App\Containers\Products\Actions\FindProductAction;
use App\Containers\Products\Actions\GetProductsAction;
use App\Containers\Products\Actions\UpdateProductAction;
use App\Containers\Products\Requests\CreateProductRequest;
use App\Containers\Products\Requests\GetProductsRequest;
use App\Containers\Products\Requests\UpdateProductRequest;
use App\Containers\Products\Resources\ProductResource;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminProductController extends ApiController
{
    public function __construct(
        protected GetProductsAction   $getProductsAction,
        protected FindProductAction   $findProductAction,
        protected CreateProductAction $createProductAction,
        protected UpdateProductAction $updateProductAction,
        protected DeleteProductAction $deleteProductAction
    )
    {
    }

    public function index(GetProductsRequest $request): ResourceCollection
    {
        $data = $this->getProductsAction->run($request->validated());
        return $this->respondWithSuccess(ProductResource::collection($data));
    }

    public function show(int $id): JsonResource
    {
        $data = $this->findProductAction->run($id);
        return $this->respondWithSuccess(new ProductResource($data));
    }

    public function store(CreateProductRequest $request): JsonResponse
    {
        $data = $this->createProductAction->run($request->validated());
        return $this->respondWithSuccessCreate(new ProductResource($data));
    }

    public function update(UpdateProductRequest $request, int $id): JsonResource
    {
        $data = $this->updateProductAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new ProductResource($data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteProductAction->run($id);
        return $this->noContent();
    }
}
