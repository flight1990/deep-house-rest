<?php

namespace App\Tasks\Users;

use App\L5Repository\UserRepository;

class DeleteUserTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
