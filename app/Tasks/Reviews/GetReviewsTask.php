<?php

namespace App\Tasks\Reviews;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetReviewsTask
{
    public function __construct(
        protected ReviewRepositoryInterface $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
