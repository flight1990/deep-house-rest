<?php

namespace App\Tasks\Seo;

use App\L5Repository\SeoRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }
}
