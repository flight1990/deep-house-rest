<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\FindUserTask;
use Illuminate\Database\Eloquent\Model;

class FindUserAction
{
    public function __construct(
        protected FindUserTask $findUserTask
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->findUserTask->run($id);
    }
}
