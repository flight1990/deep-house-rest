<?php

namespace App\Tasks;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagesTask
{
    public function __construct(
        protected PageRepositoryInterface $pageRepository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->pageRepository->paginate($limit);
    }
}
