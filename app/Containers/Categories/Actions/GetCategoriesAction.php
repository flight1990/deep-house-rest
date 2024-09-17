<?php

namespace App\Containers\Categories\Actions;

use App\Containers\Categories\Tasks\GetCategoriesTask;
use Kalnoy\Nestedset\Collection;

class GetCategoriesAction
{
    public function __construct(
        protected GetCategoriesTask $getCategoriesTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getCategoriesTask
            ->byNotInId($params['notIn'] ?? [])
            ->run()
            ->toTree();
    }
}
