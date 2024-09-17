<?php

namespace App\Containers\Menu\Actions;

use App\Containers\Menu\Tasks\GetMenuTask;
use Kalnoy\Nestedset\Collection;

class GetMenuAction
{
    public function __construct(
        protected GetMenuTask $getMenuTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getMenuTask
            ->byNotInId($params['notIn'] ?? [])
            ->run()
            ->toTree();
    }
}
