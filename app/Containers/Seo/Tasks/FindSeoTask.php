<?php

namespace App\Containers\Seo\Tasks;

use App\Containers\Seo\Repository\SeoRepository;
use App\Criteria\WhereFieldCriteria;
use Illuminate\Database\Eloquent\Model;

class FindSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        if (is_numeric($identifier)) {
            return $this->repository->find($identifier);
        }

        return  $this->repository
            ->pushCriteria(new WhereFieldCriteria('url', $identifier))
            ->first();
    }
}
