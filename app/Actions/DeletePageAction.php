<?php

namespace App\Actions;

use App\Tasks\DeletePageTask;

class DeletePageAction
{
    public function __construct(
        protected DeletePageTask $deletePageTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deletePageTask->run($id);
    }
}
