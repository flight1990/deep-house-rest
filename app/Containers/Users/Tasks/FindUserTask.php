<?php

namespace App\Containers\Users\Tasks;

use App\Containers\Users\Repository\UserRepository;
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
        return $this->repository->findOrFail($id);
    }
}
