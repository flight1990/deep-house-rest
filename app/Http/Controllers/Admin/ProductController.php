<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Products\CreateProductAction;
use App\Actions\Products\DeleteProductAction;
use App\Actions\Products\FindProductAction;
use App\Actions\Products\GetProductsAction;
use App\Actions\Products\UpdateProductAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends BaseController
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

    public function index(Request $request): ResourceCollection
    {
        $data = $this->getProductsAction->run($request->all());
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
