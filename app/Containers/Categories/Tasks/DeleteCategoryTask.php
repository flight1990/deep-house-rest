<?php

namespace App\Containers\Categories\Tasks;

use App\Containers\Categories\Repository\CategoryRepository;

class DeleteCategoryTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
