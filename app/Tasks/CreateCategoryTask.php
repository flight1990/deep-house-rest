<?php

namespace App\Tasks;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->categoryRepository->create($payload);
    }
}
