<?php

namespace App\Tasks\Categories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->findById($identifier);
        }

        return $this->repository->findBySlug($identifier);
    }
}
