<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\CreateTokenTask;

class CreateTokenAction
{
    public function __construct(
        protected CreateTokenTask $createTokenTask
    )
    {
    }

    public function run($user): string
    {
        return $this->createTokenTask->run($user);
    }
}
