<?php

namespace App\Tasks\Users;

use App\L5Repository\UserRepository;
use Illuminate\Database\Eloquent\Model;

class CreateUserTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
