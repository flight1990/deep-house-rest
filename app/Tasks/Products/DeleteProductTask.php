<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;

class DeleteProductTask
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->productRepository->delete($id);
    }
}
