<?php

namespace App\Actions;

use App\Tasks\CreateUserTask;
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
