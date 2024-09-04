<?php

namespace App\Tasks\Categories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesTask
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function run(int $id = null): Collection
    {
        return $this->categoryRepository->all($id);
    }
}
