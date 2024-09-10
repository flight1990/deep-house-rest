<?php

namespace App\Tasks\Pages;

use App\L5Repository\PageRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagesTask
{
    public function __construct(
        protected PageRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
