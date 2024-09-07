<?php

namespace App\Tasks\Categories;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class DeleteCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
