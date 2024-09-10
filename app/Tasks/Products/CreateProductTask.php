<?php

namespace App\Tasks\Products;

use App\L5Repository\ProductRepository;
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
