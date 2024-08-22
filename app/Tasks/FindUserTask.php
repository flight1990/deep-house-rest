<?php

namespace App\Tasks;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindUserTask
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->userRepository->findById($id);
    }
}
