<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\GetCategoriesTask;
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
            ->byExceptId($params['except'] ?? [])
            ->run()
            ->toTree();
    }
}
