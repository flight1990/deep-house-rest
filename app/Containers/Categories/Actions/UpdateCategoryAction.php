<?php

namespace App\Containers\Categories\Actions;

use App\Containers\Categories\Tasks\UpdateCategoryTask;
use Illuminate\Database\Eloquent\Model;

class UpdateCategoryAction
{
    public function __construct(
        protected UpdateCategoryTask $updateCategoryTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateCategoryTask->run($payload, $id);
    }
}
