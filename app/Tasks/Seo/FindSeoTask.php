<?php

namespace App\Tasks\Seo;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $repository
    )
    {
    }

    public function run(int|string $identifier): Model
    {
        if (is_numeric($identifier)) {
            return $this->repository->findById($identifier);
        }

        return  $this->repository->findByUrl($identifier);
    }
}
