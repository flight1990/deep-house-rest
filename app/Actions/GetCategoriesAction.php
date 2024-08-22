<?php

namespace App\Actions;

use App\Tasks\GetCategoriesTask;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesAction
{
    public function __construct(
        protected GetCategoriesTask $getCategoriesTask
    )
    {
    }

    public function run(array $params = []): Collection
    {
        return $this->getCategoriesTask->run();
    }
}
