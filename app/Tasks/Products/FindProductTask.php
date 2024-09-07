<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindProductTask
{
    public function __construct(
        protected ProductRepositoryInterface $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->findById($identifier);
        }

        return $this->repository->findBySlug($identifier);
    }
}
