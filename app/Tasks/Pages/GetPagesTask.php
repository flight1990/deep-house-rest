<?php

namespace App\Tasks\Pages;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagesTask
{
    public function __construct(
        protected PageRepositoryInterface $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
