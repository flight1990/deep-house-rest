<?php

namespace App\Actions\Users;

use App\Tasks\Users\GetAuthUserTask;
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
