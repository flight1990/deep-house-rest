<?php

namespace App\Containers\Menu\Actions;

use App\Containers\Menu\Tasks\FindMenuTask;
use Illuminate\Database\Eloquent\Model;

class FindMenuAction
{
    public function __construct(
        protected FindMenuTask $findMenuTask
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->findMenuTask->run($id);
    }
}
