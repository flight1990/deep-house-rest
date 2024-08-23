<?php

namespace App\Tasks;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $seoRepository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->seoRepository->paginate($limit);
    }
}
