<?php

namespace App\Actions\Users;

use App\Tasks\Users\DeleteUserTask;

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
