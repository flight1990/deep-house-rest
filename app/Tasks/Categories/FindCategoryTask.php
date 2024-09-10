<?php

namespace App\Tasks\Categories;

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

        return $this->repository->findByField('slug', $identifier);
    }
}
