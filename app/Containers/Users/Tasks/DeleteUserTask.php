<?php

namespace App\Containers\Users\Tasks;

use App\Containers\Users\Repository\UserRepository;

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
