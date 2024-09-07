<?php

namespace App\Tasks\Products;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateProductTask
{
    public function __construct(
        protected ProductRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
