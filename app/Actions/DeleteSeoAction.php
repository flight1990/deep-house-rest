<?php

namespace App\Actions;

use App\Tasks\DeleteSeoTask;

class DeleteSeoAction
{
    public function __construct(
        protected DeleteSeoTask $deleteSeoTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteSeoTask->run($id);
    }
}
