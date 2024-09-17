<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\DeleteUserTask;

class DeleteUserAction
{
    public function __construct(
        protected DeleteUserTask $deleteUserTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteUserTask->run($id);
    }
}
