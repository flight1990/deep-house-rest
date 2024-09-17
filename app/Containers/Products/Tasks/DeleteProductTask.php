<?php

namespace App\Containers\Products\Tasks;

use App\Containers\Products\Repository\ProductRepository;

class DeleteProductTask
{
    public function __construct(
        protected ProductRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
