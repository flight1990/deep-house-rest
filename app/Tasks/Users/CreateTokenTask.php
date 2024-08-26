<?php

namespace App\Tasks\Users;

use Illuminate\Database\Eloquent\Model;

class CreateTokenTask
{
    public function run($user): string
    {
        return $user->createToken(env('APP_NAME'))->plainTextToken;
    }
}
