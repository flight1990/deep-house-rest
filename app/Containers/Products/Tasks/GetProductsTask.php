<?php

namespace App\Containers\Products\Tasks;

use App\Containers\Products\Repository\ProductRepository;
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
        return $this->repository
            ->with(['category', 'photos'])
            ->paginate($limit);
    }
}
