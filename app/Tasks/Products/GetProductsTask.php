<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetProductsTask
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->productRepository->paginate($limit);
    }
}
