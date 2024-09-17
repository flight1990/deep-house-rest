<?php

namespace App\Containers\Users\Tasks;

use App\Containers\Users\Repository\UserRepository;
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
