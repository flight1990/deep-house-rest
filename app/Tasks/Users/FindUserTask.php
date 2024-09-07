<?php

namespace App\Tasks\Users;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindUserTask
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository->findById($id);
    }
}
