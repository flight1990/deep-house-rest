<?php

namespace App\Tasks\Products;

use App\L5Repository\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class FindProductTask
{
    public function __construct(
        protected ProductRepository $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->find($identifier);
        }

        return $this->repository->findByField('slug', $identifier);
    }
}
