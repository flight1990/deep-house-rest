<?php

namespace App\Tasks\Users;

use App\Repositories\Contracts\UserRepositoryInterface;

class DeleteUserTask
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
