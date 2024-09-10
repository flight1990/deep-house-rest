<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\GetMenuTask;
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
            ->byExceptId($params['except'] ?? [])
            ->run()
            ->toTree();
    }
}
