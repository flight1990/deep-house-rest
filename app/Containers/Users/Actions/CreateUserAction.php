<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\CreateUserTask;
use Illuminate\Database\Eloquent\Model;

class CreateUserAction
{
    public function __construct(
        protected CreateUserTask $createUserTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createUserTask->run($payload);
    }
}
