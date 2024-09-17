<?php

namespace App\Containers\Categories\Tasks;

use App\Containers\Categories\Repository\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateCategoryTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
