<?php

namespace App\Tasks\Products;

use App\L5Repository\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetProductsTask
{
    public function __construct(
        protected ProductRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
