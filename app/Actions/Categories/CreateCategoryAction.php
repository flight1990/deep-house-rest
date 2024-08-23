<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\CreateCategoryTask;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryAction
{
    public function __construct(
        protected CreateCategoryTask $createCategoryTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createCategoryTask->run($payload);
    }
}
