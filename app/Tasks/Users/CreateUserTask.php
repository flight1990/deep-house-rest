<?php

namespace App\Tasks\Users;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateUserTask
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
