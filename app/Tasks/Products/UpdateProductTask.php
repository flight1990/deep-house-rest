<?php

namespace App\Tasks\Products;

use App\L5Repository\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateProductTask
{
    public function __construct(
        protected ProductRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
