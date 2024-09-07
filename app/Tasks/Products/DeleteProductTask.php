<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;

class DeleteProductTask
{
    public function __construct(
        protected ProductRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
