<?php

namespace App\Actions\Users;

use App\Tasks\Users\UpdateUserTask;
use Illuminate\Database\Eloquent\Model;

class UpdateUserAction
{
    public function __construct(
        protected UpdateUserTask $updateUserTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateUserTask->run($payload, $id);
    }
}
