<?php

namespace App\Tasks;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->categoryRepository->findById($identifier);
        }

        return $this->categoryRepository->findBySlug($identifier);
    }
}
