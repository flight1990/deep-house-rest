<?php

namespace App\Actions;

use App\Tasks\DeleteMenuTask;

class DeleteMenuAction
{
    public function __construct(
        protected DeleteMenuTask $deleteMenuTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteMenuTask->run($id);
    }
}
