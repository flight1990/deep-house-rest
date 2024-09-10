<?php

namespace App\Tasks\Users;

use App\L5Repository\UserRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateUserTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
