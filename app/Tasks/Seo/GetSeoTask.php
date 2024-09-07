<?php

namespace App\Tasks\Seo;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
