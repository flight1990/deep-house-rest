<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\GetAuthUserTask;
use Illuminate\Contracts\Auth\Authenticatable;

class GetAuthUserAction
{
    public function __construct(
        protected GetAuthUserTask $getAuthUserTask
    )
    {}

    public function run(): ?Authenticatable
    {
        return $this->getAuthUserTask->run();
    }
}
