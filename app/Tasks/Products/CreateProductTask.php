<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateProductTask
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->productRepository->create($payload);
    }
}
