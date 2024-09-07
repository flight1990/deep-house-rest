<?php

namespace App\Tasks\Categories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateCategoryTask
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
