<?php

namespace App\Actions;

use App\Tasks\GetMenuTask;
use Illuminate\Database\Eloquent\Collection;

class GetMenuAction
{
    public function __construct(
        protected GetMenuTask $getMenuTask
    )
    {
    }

    public function run(array $params = []): Collection
    {
        return $this->getMenuTask->run();
    }
}
