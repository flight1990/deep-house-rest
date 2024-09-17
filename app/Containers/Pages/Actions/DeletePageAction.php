<?php

namespace App\Containers\Pages\Actions;

use App\Containers\Pages\Tasks\DeletePageTask;

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
