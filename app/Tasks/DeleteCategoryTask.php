<?php

namespace App\Tasks;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class DeleteCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->categoryRepository->delete($id);
    }
}
