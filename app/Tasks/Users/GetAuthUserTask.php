<?php

namespace App\Tasks\Users;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class GetAuthUserTask
{
    public function run(): ?Authenticatable
    {
        return Auth::user();
    }
}
