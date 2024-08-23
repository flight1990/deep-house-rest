<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\DeletePageTask;

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
