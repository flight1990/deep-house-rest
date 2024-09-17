<?php

namespace App\Containers\Categories\Tasks;

use App\Containers\Categories\Repository\CategoryRepository;
use App\Criteria\WhereFieldCriteria;
use Illuminate\Database\Eloquent\Model;

class FindCategoryTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->findOrFail($identifier);
        }

        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('slug', $identifier))
            ->firstOrFail();
    }
}
