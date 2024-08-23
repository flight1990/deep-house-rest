<?php

namespace App\Actions\Users;

use App\Tasks\Users\FindUserTask;
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
