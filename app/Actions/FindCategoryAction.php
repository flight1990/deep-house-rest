<?php

namespace App\Actions;

use App\Tasks\FindCategoryTask;
use Illuminate\Database\Eloquent\Model;

class FindCategoryAction
{
    public function __construct(
        protected FindCategoryTask $findCategoryTask
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        return $this->findCategoryTask->run($identifier);
    }
}
