<?php

namespace App\Tasks\Reviews;

use App\L5Repository\ReviewRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetReviewsTask
{
    public function __construct(
        protected ReviewRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
