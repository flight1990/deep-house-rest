<?php

namespace App\Tasks\Categories;

use App\Criteria\WhereFieldCriteria;
use App\L5Repository\CategoryRepository;
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
            return $this->repository->find($identifier);
        }

        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('slug', $identifier))
            ->firstOrFail();
    }
}
