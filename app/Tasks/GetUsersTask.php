<?php

namespace App\Tasks;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersTask
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->userRepository->paginate($limit);
    }
}
