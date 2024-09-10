<?php

namespace App\Tasks\Seo;

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
            return $this->repository->find($identifier);
        }

        return  $this->repository->findByField('url', $identifier);
    }
}
