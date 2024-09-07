<?php

namespace App\Tasks\Categories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
