<?php

namespace App\Tasks\Seo;

use App\Criteria\WhereFieldCriteria;
use App\L5Repository\SeoRepository;
use Illuminate\Database\Eloquent\Model;

class FindSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->findOrFail($identifier);
        }

        return  $this->repository
            ->pushCriteria(new WhereFieldCriteria('url', $identifier))
            ->firstOrFail();
    }
}
