<?php

namespace App\Containers\Products\Tasks;

use App\Containers\Products\Repository\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class CreateProductTask
{
    public function __construct(
        protected ProductRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
