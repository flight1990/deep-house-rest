<?php

namespace App\Containers\Products\Tasks;

use App\Containers\Products\Repository\ProductRepository;
use App\Criteria\WhereFieldCriteria;
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
        $this->repository
            ->with(['category', 'photos']);


        if (is_numeric($identifier)) {
            return $this->repository->findOrFail($identifier);
        }

        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('slug', $identifier))
            ->firstOrFail();
    }
}
