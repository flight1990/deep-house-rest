<?php

namespace App\Tasks\Products;

use App\L5Repository\ProductRepository;

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
