<?php

namespace App\Tasks\Users;

use App\L5Repository\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
