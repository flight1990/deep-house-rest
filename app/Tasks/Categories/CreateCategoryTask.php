<?php

namespace App\Tasks\Categories;

use App\L5Repository\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
