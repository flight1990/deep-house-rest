<?php

namespace App\Containers\Users\Tasks;

use App\Containers\Users\Repository\UserRepository;
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
