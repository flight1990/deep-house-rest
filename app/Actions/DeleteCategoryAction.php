<?php

namespace App\Actions;

use App\Tasks\DeleteCategoryTask;

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
