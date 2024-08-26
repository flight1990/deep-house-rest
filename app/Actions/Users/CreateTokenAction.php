<?php

namespace App\Actions\Users;

use App\Tasks\Users\CreateTokenTask;
use Illuminate\Database\Eloquent\Model;

class CreateTokenAction
{
    public function __construct(
        protected CreateTokenTask $createTokenTask
    )
    {
    }

    public function run(Model $user): string
    {
        return $this->createTokenTask->run($user);
    }
}
