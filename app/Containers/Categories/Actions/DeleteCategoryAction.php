<?php

namespace App\Containers\Categories\Actions;

use App\Containers\Categories\Tasks\DeleteCategoryTask;

class DeleteCategoryAction
{
    public function __construct(
        protected DeleteCategoryTask $deleteCategoryTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteCategoryTask->run($id);
    }
}
