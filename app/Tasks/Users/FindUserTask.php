<?php

namespace App\Tasks\Users;

use App\L5Repository\UserRepository;
use Illuminate\Database\Eloquent\Model;

class FindUserTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository->find($id);
    }
}
