<?php

namespace App\Containers\Users\Tasks;

class CreateTokenTask
{
    public function run($user): string
    {
        return $user->createToken(env('APP_NAME'))->plainTextToken;
    }
}
