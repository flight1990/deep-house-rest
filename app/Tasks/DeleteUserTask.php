<?php

namespace App\Tasks;

use App\Repositories\Contracts\UserRepositoryInterface;

class DeleteUserTask
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}
