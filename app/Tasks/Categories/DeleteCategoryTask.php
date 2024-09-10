<?php

namespace App\Tasks\Categories;

use App\L5Repository\CategoryRepository;

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
