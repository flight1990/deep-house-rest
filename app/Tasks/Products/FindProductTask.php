<?php

namespace App\Tasks\Products;

use App\Criteria\WhereFieldCriteria;
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
        $this->repository
            ->with(['category', 'photos']);


        if (is_numeric($identifier)) {
            return $this->repository->find($identifier);
        }

        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('slug', $identifier))
            ->firstOrFail();
    }
}
